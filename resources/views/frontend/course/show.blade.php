@extends('layouts.frontend.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <iframe class="w-100 rounded" height="400"
                            src="https://www.youtube.com/embed/{{ $data['course']['detail'][0]['link'] }}">
                        </iframe>
                        <h2>{{ $data['course']['name'] }}</h2>
                        <div>
                            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description"
                                        role="tab" aria-controls="description" aria-selected="true">Deskripsi</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="materi-tab" data-bs-toggle="tab" href="#materi" role="tab"
                                        aria-controls="materi" aria-selected="false">Materi</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    <p class="my-2">
                                        {!! $data['course']['description'] !!}
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="materi" role="tabpanel" aria-labelledby="materi-tab">
                                    <h6>{{ $data['course']['total_video'] }} ({{ $data['course']['total_duration'] }})</h6>
                                    @foreach ($data['course']['detail'] as $detail)
                                        <div class="alert alert-secondary"><i data-feather="video"></i>
                                            {{ $detail->number }}.{{ $detail->name }}</div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <form action="{{ route('frontend.user.transaction.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $data['course']['id'] }}">
                        <div class="card-body">
                            <h4>Harga Kursus</h4>
                            <h3>{{ $data['course']['price_rupiah'] }}</h3>
                            <hr>
                            @auth
                                    @php
                                        $userCourse = auth()
                                            ->user()
                                            ->UserCourse()
                                            ->pluck('course_id')
                                            ->toArray();
                                    @endphp
                                    @if (!in_array($data['course']['id'], $userCourse))
                                        <button type="submit" class="btn btn-primary btn-block">Beli Kursus Ini</button>
                                    @else
                                        <a href="{{ route('frontend.user.course.index') }}"
                                            class="btn btn-primary btn-block">Lanjutkan Belajar</a>
                                    @endif
                            @else
                                <button type="submit" class="btn btn-primary btn-block">Beli Kursus Ini</button>
                            @endauth
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
