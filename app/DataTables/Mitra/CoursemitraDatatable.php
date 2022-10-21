<?php

namespace App\DataTables\Mitra;

use App\Models\Feature\Course;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CoursemitraDatatable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
            return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $data['action'] = $this->actions($query);
                return view('datatable.actions', compact('data','query'))->render();
            })
            ->addIndexColumn()            
            ->rawColumns(['action','type_name'])
            ->setRowId('id');
    }

    public function actions($id)
    {
        return  [
            [
                'title' => __('button.detail'),
                'icon' => 'bi bi-eye',
                'route' => route('frontend.mitra.course.show',$id),
                'type' => 'detail',
            ],
            [
                'title' => __('button.edit'),
                'icon' => 'bi bi-pen',
                'route' => route('frontend.mitra.course.edit',$id),
                'type' => 'edit',
            ],
            [
                'title' => 'Hapus',
                'icon' => 'bi bi-trash',
                'route' => route('backend.master.category.delete',$id),
                'type' => 'delete',
            ],
        ];
    }

    public function query(Course $model): QueryBuilder
    {
        return $model->newQuery()->with(['Mitra'])->whereHas('Mitra',function($q){
            $q->where('user_id',auth()->user()->id);
        })->OrderBy('id','desc');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('course-table')
            ->columns($this->getColumns())
            ->minifiedAjax();
    }


    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('#')->orderable(false)->searchable(false),
            Column::make('name')->title(__('field.course_name'))->orderable(false),
            Column::make('type_name')->title(__('field.course_type'))->orderable(false)->searchable(false),
            Column::make('price')->title(__('field.course_price')),
            Column::make('total_duration')->title(__('field.course_duration'))->orderable(false)->searchable(false),
            Column::make('total_video')->title(__('field.course_total'))->orderable(false)->searchable(false),
            Column::make('total_student')->title(__('field.course_student'))->orderable(false)->searchable(false),
            Column::make('action')->title(__('field.action'))->orderable(false)->searchable(false),
        ];
    }



    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}
