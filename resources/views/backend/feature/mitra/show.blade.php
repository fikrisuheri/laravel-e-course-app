@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">{{ __('button.detail') }} {{ __('sidebar.mitra') }}</h4>
                    <a href="{{ route('backend.feature.mitra.index') }}" class="btn btn-primary">{{ __('button.back') }}</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table>
                                <tr>
                                    <th>{{ __('field.mitra_name') }}</th>
                                    <td>: {{ $data['mitra']['name'] }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('field.mitra_owner') }}</th>
                                    <td>: {{ $data['mitra']['user']['name'] }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('field.description') }}</th>
                                    <td>: {{ $data['mitra']['description'] }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ $data['mitra']['logo_path'] }}" alt="" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Course Table --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">{{ __('sidebar.course') }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered show-datatable"> 
                        <thead>
                            <tr>
                                <th>{{ __('field.course_name') }}</th>
                                <th>{{ __('field.course_price') }}</th>
                                <th>{{ __('field.course_category') }}</th>
                                <th>{{ __('field.course_type') }}</th>
                                <th>{{ __('field.course_total') }}</th>
                                <th>{{ __('field.course_student') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['mitra']['course'] as $course)
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->price_rupiah }}</td>
                                    <td>{{ $course->category->name }}</td>
                                    <td>{!! $course->type_name !!}</td>
                                    <td>{{ $course->total_video }}</td>
                                    <td>{{ $course->total_student }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('.show-datatable').DataTable()
    </script>
@endpush