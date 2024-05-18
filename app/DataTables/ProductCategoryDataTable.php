<?php

namespace App\DataTables;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductCategoryDataTable extends DataTable
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
                $edit = "<a href='" . route('admin.product-category.edit', $query->id) . "' class='btn btn-success'><i class='fas fa-pencil-alt'></i></a>";
                $delete = "<a href='" . route('admin.product-category.destroy', $query->id) . "' class='btn btn-danger ml-3 delete-item'><i class='fas fa-trash-alt'></i></a>";

                return $edit . $delete;
            })
            ->addColumn('icon', function ($query) {
                return '<i style="font-size:4rem" class="' . $query->icon . '"></i>';
            })->addColumn('status', function ($query) {
                if ($query->status === 1) {
                    return '<span class="badge rounded-pill text-white bg-primary">Active</span>';
                } else {
                    return '<span class="badge rounded-pill text-white bg-danger">Inactive</span>';
                }
            })->addColumn('show_at_home', function ($query) {
                if ($query->show_at_home === 1) {
                    return '<span class="badge rounded-pill text-white bg-primary">Yes</span>';
                } else {
                    return '<span class="badge rounded-pill text-white bg-danger">No</span>';
                }
            })
            ->rawColumns(['action', 'icon', 'status', 'show_at_home'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductCategory $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('productcategory-table')
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
            Column::make('name'),
            Column::make('status'),
            Column::make('show_at_home'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProductCategory_' . date('YmdHis');
    }
}
