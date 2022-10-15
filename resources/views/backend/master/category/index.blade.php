@extends('layouts.backend.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Master Category</h4>
        <div class="card-header-action">
            <a href="" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        {!! $dataTable->table(['class' => 'table table-striped table-bordered']) !!}
    </div>
</div>
@endsection
@push('js')
{!! $dataTable->scripts() !!}
@endpush