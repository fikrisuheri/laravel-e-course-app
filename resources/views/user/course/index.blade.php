@extends('layouts.user.app')
@section('content')
 <div class="row">
    @foreach ($data['userCourse'] as $userCourse)
           <div class="col-md-3">
            <div class="card">
                <div class="card-content">
                  <img class="card-img-top img-fluid" src="{{ $userCourse['course']['image_path'] }}" alt="Card image cap" style="height: 200px">
                  <div class="card-body">
                    <h4 class="card-title">{{ $userCourse['course']['name'] }}</h4>
                    <hr>
                    <div class="mb-2">
                      <b>Progress: {{ $userCourse['progress_percent'] == 100 ? 'Selesai' : $userCourse['progress_percent'] . '%' }} </b> 
                    </div>
                    <a href="{{ route('frontend.user.course.learn',[
                      'id' => $userCourse['id'],
                      'progress' => $userCourse['progress']
                    ]) }}" class="btn btn-primary btn-block">Lanjutkan Belajar</a>
                </div>
              </div>
        </div>
           @endforeach
 </div>
@endsection
