@extends('layouts.frontend.app')
@section('content')
<div class="row">
    @foreach ($data['course'] as $course)
    <div class="col-md-3">
     <div class="card">
         <div class="card-content">
           <img class="card-img-top img-fluid" src="{{ $course->image_path }}" alt="Card image cap" style="height: 200px">
           <div class="card-body">
             <h4 class="card-title">{{ $course['name'] }}</h4>
             <p class="card-text">
               {{ $course['price_rupiah'] }}
             </p>
             <a href="{{ route('frontend.course.show',[
                 'mitraSlug' => $course['mitra']['slug'],
                 'courseSlug' => $course['slug'],
             ]) }}" class="btn btn-primary block">Lihat Kursus</a>
           </div>
         </div>
       </div>
 </div>
    @endforeach
 </div>
@endsection