<?php

namespace App\DataTables\Feature;

use App\Models\Feature\Withdrawal;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class WithdrawDatatable extends DataTable
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
        $button = [];
        if ($id->status == 0) {
            $button[] = [
                'title' => __('button.witdraw_success'),
                'icon' => 'bi bi-send',
                'route' => route('backend.feature.withdraw.sent',$id),
                'type' => '',
            ];
        }
        return $button;
    }

    public function query(Withdrawal $model): QueryBuilder
    {
        return $model->newQuery()->with(['User'])->OrderBy('id','desc');
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
            Column::make('created_at')->title(__('field.date')),
            Column::make('user.name')->title(__('field.user_name')),
            Column::make('amount')->title(__('field.amount')),
            Column::make('html_status')->title(__('field.status')),
            Column::make('description')->title(__('field.description')),
            Column::make('action')->title(__('field.action'))->orderable(false)->searchable(false),
        ];
    }



    protected function filename(): string
    {
        return 'Transcatoin_' . date('YmdHis');
    }
}
