@extends('layouts.frontend.app')
@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 pt-md-5 mb-3">
                <h1 class="text-uppercase">Selamat Datang Di Laracourse</h1>
                <h4>Temukan Beragam Kursus Untuk Mengupgrade Skill kamu</h4>
                <a href="#" class="btn btn-outline-primary">Cari Kursus</a>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('depan/image/support-team.svg') }}" alt="" srcset="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Kursus Terbaru</h2>
            </div>
        </div>
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
    </div>
@endsection
