@extends('layouts.backend.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">{{ __('button.see_invoice') }}</h4>
        <a href="{{ route('backend.feature.transaction.index') }}" class="btn btn-primary">{{ __('button.back') }}</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table>
                    <tr>
                        <th>{{ __('field.transaction_buyer') }}</th>
                        <td>: {{ $data['transaction']['user']['name'] }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('field.transaction_invoice') }}</th>
                        <td>: {{ $data['transaction']['invoice_number'] }}</td>
                    </tr>
                    <tr>
                        <th>{{ __('sidebar.course') }}</th>
                        <td>: {{ $data['transaction']['course']['name'] }}</td>
                    </tr>
                     <tr>
                        <th>{{ __('field.transaction_status') }}</th>
                        <td>: {!! $data['transaction']['html_status'] !!}</td>
                    </tr>
                    <tr>
                        <th>{{ __('field.transaction_total_pay') }}</th>
                        <td>: {{ $data['transaction']['total_pay'] }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <img src="{{ $data['transaction']['course']['image_path'] }}" alt="" class="w-100">
            </div>
        </div>
    </div>
    
</div>
@endsection
