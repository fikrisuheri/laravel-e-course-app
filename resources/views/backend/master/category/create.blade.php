@extends('layouts.backend.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Tambah Category</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('backend.master.category.store') }}" method="POST">
            @csrf
            <x-forms.input name="name" id="name" label="Category" :isRequired="true" />
        <div class="text-end mt-3">
            <a href="{{ route('backend.master.category.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
    </div>
</div>
@endsection
 