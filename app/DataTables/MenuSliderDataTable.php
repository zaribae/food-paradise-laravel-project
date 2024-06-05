<?php

namespace App\DataTables;

use App\Models\MenuSlider;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MenuSliderDataTable extends DataTable
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
                $edit = "<a href='" . route('admin.menu-slider.edit', $query->id) . "' class='btn btn-success'><i class='fas fa-pencil-alt'></i></a>";
                $delete = "<a href='" . route('admin.menu-slider.destroy', $query->id) . "' class='btn btn-danger ml-3 delete-item'><i class='fas fa-trash-alt'></i></a>";

                return $edit . $delete;
            })
            ->addColumn('banner', function ($query) {
                return '<img width="150rem" src="' . asset($query->banner) . '">';
            })
            ->addColumn('status', function ($query) {
                if ($query->status === 1) {
                    return '<span class="badge rounded-pill text-white bg-primary">Active</span>';
                } else {
                    return '<span class="badge rounded-pill text-white bg-danger">Inactive</span>';
                }
            })
            ->rawColumns(['action', 'banner', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(MenuSlider $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('menuslider-table')
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
            Column::make('banner'),
            Column::make('title'),
            Column::make('status'),
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
        return 'MenuSlider_' . date('YmdHis');
    }
}
