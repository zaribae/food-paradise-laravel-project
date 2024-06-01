<?php

namespace App\DataTables;

use App\Models\InProcess;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DeliveredOrderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $view = "<a href='" . route('admin.orders.show', $query->id) . "' class='btn btn-primary'><i class='fas fa-eye'></i></a>";
                $status = "<a href='javascript:;' class='btn btn-warning ml-3 order-status-btn' data-id='" . $query->id . "'><i class='fas fa-truck' data-toggle='modal' data-target='#statusModal'></i></a>";
                $delete = "<a href='" . route('admin.orders.destroy', $query->id) . "' class='btn btn-danger ml-3 delete-item'><i class='fas fa-trash-alt'></i></a>";

                return $view . $status . $delete;
            })
            ->addColumn('user_name', function ($query) {
                return $query->user?->name;
            })
            ->addColumn('grand_total', function ($query) {
                return $query->grand_total . ' ' . $query->currency_name;
            })
            ->addColumn('order_status', function ($query) {
                if (strtoupper($query->order_status === 'DELIVERED')) {
                    return '<span class="badge rounded-pill text-white bg-success">Delivered</span>';
                } else if (strtoupper($query->order_status === 'DECLINED')) {
                    return '<span class="badge rounded-pill text-white bg-danger">Declined</span>';
                } else {
                    return '<span class="badge rounded-pill text-white bg-warning">' . $query->order_status . '</span>';
                }
            })
            ->addColumn('payment_status', function ($query) {
                if (strtoupper($query->payment_status) === 'PENDING') {
                    return '<span class="badge rounded-pill text-white bg-warning">Pending</span>';
                } else if (strtoupper($query->payment_status) === 'COMPLETED') {
                    return '<span class="badge rounded-pill text-white bg-success">Completed</span>';
                } else {
                    return '<span class="badge rounded-pill text-white bg-warning">' . $query->payment_status . '</span>';
                }
            })
            ->addColumn('date', function ($query) {
                return date('d-m-Y', strtotime($query->created_at));
            })
            ->rawColumns(['order_status', 'payment_status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->where('order_status', 'DELIVERED')->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('inprocess-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('invoice_id'),
            Column::make('user_name'),
            Column::make('product_qty'),
            Column::make('grand_total'),
            Column::make('order_status'),
            Column::make('payment_status'),
            Column::make('date'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'InProcess_' . date('YmdHis');
    }
}
