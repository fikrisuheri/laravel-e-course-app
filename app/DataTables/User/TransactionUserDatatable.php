<?php

namespace App\DataTables\User;

use App\Models\Feature\Transaction;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TransactionUserDatatable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
            return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $data['action'] = $this->actions($query);
                return view('datatable.actions', compact('data','query'))->render();
            })
            ->addIndexColumn()            
            ->rawColumns(['action','html_status'])
            ->setRowId('id');
    }

    public function actions($id)
    {
        return  [
            [
                'title' => __('button.see_invoice'),
                'icon' => 'bi bi-eye',
                'route' => route('frontend.user.transaction.invoice',$id->invoice_number),
                'type' => '',
            ],
        ];
    }

    public function query(Transaction $model): QueryBuilder
    {
        return $model->newQuery()->with(['Course'])->where('user_id',auth()->user()->id)->OrderBy('id','desc');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('transaction-table')
            ->columns($this->getColumns())
            ->minifiedAjax();
    }


    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('#')->orderable(false)->searchable(false),
            Column::make('invoice_number')->title(__('field.transaction_invoice')),
            Column::make('course_name')->title(__('field.course_name'))->searchable(false)->orderable('false'),
            Column::make('total_pay')->title(__('field.transaction_total_pay')),
            Column::make('html_status')->title(__('field.transaction_status'))->searchable(false)->orderable('false'),
            Column::make('action')->title(__('field.action'))->orderable(false)->searchable(false),
        ];
    }



    protected function filename(): string
    {
        return 'Transcatoin_' . date('YmdHis');
    }
}
