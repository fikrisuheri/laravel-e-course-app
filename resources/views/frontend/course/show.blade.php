@extends('layouts.frontend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <iframe class="w-100 rounded" height="400" src="https://www.youtube.com/embed/{{ $data['course']['detail'][0]['link'] }}">
                        </iframe>
                        <h2>{{ $data['course']['name'] }}</h2>
                        {!! $data['course']['type_name'] !!}
                        <div>
                            {!! $data['course']['description'] !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
               <div class="card">
                <div class="card-body">
                    <h4>Harga Kursus</h4>
                    <h3>{{ $data['course']['price_rupiah'] }}</h3>
                    <hr>
                    <a href="" class="btn btn-primary btn-block">Beli Kursus Ini</a>
                </div>
               </div>
               <div class="card">
                <div class="card-header">
                    <h4>{{ $data['course']['total_video'] }} ({{ $data['course']['total_duration'] }})</h4>
                </div>
                <div class="card-body">
                    @foreach ($data['course']['detail'] as $detail)
                    <div class="mb-2">
                        <a href="#" class="btn btn-block text-left icon icon-left btn-light"><i data-feather="video"></i>  {{ $detail->name }}</a>                        
                    </div>
                    @endforeach
                </div>
               </div>
            </div>
        </div>
    </div>
@endsection