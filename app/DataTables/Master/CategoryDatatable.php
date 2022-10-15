<?php

namespace App\DataTables\Master;

use App\Models\Master\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDatatable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
            return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $data['action'] = $this->actions($query);
                return view('datatable.actions', compact('data','query'))->render();
            })
            ->rawColumns(['action'])
            ->setRowId('id');
    }

    public function actions($id)
    {
        return  [
            [
                'title' => 'Hapus Pengguna',
                'icon' => 'bi bi-stack',
                'route' => '',
            ],
        ];
    }

    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery()->OrderBy('id','desc');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('category-table')
            ->columns($this->getColumns())
            ->minifiedAjax();
    }


    protected function getColumns(): array
    {
        return [
            Column::make('name')->title('Kategori')->orderable(false),
            Column::make('action')->title('Aksi')->orderable(false),
        ];
    }



    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}
