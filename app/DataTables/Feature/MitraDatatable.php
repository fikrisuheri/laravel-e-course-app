<?php

namespace App\DataTables\Feature;

use App\Models\Feature\Mitra;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MitraDatatable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
            return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $data['action'] = $this->actions($query);
                return view('datatable.actions', compact('data','query'))->render();
            })
            ->addColumn('image', function ($query) {
                return '<img src="' . $query->logo_path . '" width="100">';
            })
            ->rawColumns(['action','html_status','image'])
            ->setRowId('id');
    }

    public function actions($id)
    {
            if($id->is_approved == 0){
                $button[] = [
                    'title' => __('button.review'),
                    'icon' => 'bi bi-eye',
                    'route' => 'javascript:;',
                    'type' => '',
                    'modal' => 'modalReview',
                    'dataModal' => [
                       [
                        'name' => 'description',
                        'value' => $id->description,
                       ],
                       [
                        'name' => 'name',
                        'value' => $id->name,
                       ],
                       [
                        'name' => 'id',
                        'value' => $id->id,
                       ],
                    ]
                    ];
            }
            $button[] = [
                'title' => __('button.detail'),
                'icon' => 'bi bi-eye',
                'route' => route('backend.feature.mitra.show',$id),
                'type' => ''
            ];
        return $button;
    }

    public function query(Mitra $model): QueryBuilder
    {
        return $model->newQuery()->OrderBy('id','desc');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('mitra-table')
            ->columns($this->getColumns())
            ->minifiedAjax();
    }


    protected function getColumns(): array
    {
        return [
            Column::make('name')->title(__('field.mitra_name'))->orderable(false),
            Column::make('image')->title('Logo')->orderable(false),
            Column::make('html_status')->title('Status')->orderable(false),
            Column::make('action')->title(__('field.action'))->orderable(false),
        ];
    }



    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}
