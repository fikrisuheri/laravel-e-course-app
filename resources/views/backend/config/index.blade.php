@extends('layouts.backend.app')
@section('content')
    <form action="{{ route('backend.config.update') }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">

                @foreach ($data['model'] as $item)
                @if($item['type'] == 0)
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>{{ $item['label'] }}</label>
                            <input name="field[{{ $item['id'] }}]" id="{{ $item['id'] }}" class="form-control @error($item['id']) is-invalid @enderror" 
                            type="text" autocomplete="false" value="{{ $item['value'] }}">
                        </div>
                    </div>
                </div>
                @elseif($item['type'] == 1)
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>{{ $item['label'] }}</label>
                            <textarea name="field[{{ $item['id'] }}]" class="form-control @error($item['id'])@endif" rows="3">{{ $item['value'] }}</textarea>
                        </div>
                    </div>
                </div>
                @elseif($item['type'] == 2)
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <img src="{{ $item['file_path'] }}" alt="{{ $item['name'] }}"  width="250px">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label>{{ $item['label'] }}</label>
                            <input type="file" name="field[{{$item['id']}}]" class="form-control">
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
        
               <div class="row">
                <div class="col">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary me-0" href="#">{{ __('button.save') }}</button>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>
    </form>
@endsection