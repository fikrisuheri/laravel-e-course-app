@extends('layouts.user.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">{{ __('button.detail') }} {{ __('sidebar.course') }}</h4>
                    <div>
                        <a href="{{ route('frontend.mitra.course.edit',$data['course']['id']) }}" class="btn btn-warning">{{ __('button.edit') }}</a>
                        <a href="{{ route('frontend.mitra.course.index') }}" class="btn btn-primary">{{ __('button.back') }}</a>
                    </div>
                </div>
                <div class="card-body">
                   <div class="row">
                    <div class="col-md-8">
                        <table>
                            <tr>
                                <th>{{ __('field.course_name') }}</th>
                                <td>: {{ $data['course']->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('field.course_category') }}</th>
                                <td>: {{ $data['course']->category->name }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('field.course_type') }}</th>
                                <td>: {!! $data['course']->type_name !!}</td>
                            </tr>
                              <tr>
                                <th>{{ __('field.course_price') }}</th>
                                <td>: {{ $data['course']->price_rupiah }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('field.course_duration') }}</th>
                                <td>: {{ $data['course']->total_Duration }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('field.course_total') }}</th>
                                <td>: {{ $data['course']->total_video }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('field.course_student') }}</th>
                                <td>: {{ $data['course']->total_student }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ $data['course']->image_path }}" class="w-100" alt="" srcset="">
                    </div>
                   </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Item</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered show-datatable">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Title</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['course']['detail'] as $detail)
                                    <tr>
                                        <td>{{ $detail->number }}</td>
                                        <td>{{ $detail->name }}</td>
                                        <td><a href="https://www.youtube.com/watch?v={{ $detail->link }}" class="badge bg-primary" target="_blank">Lihat Di Youtube </a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('field.course_student') }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered show-datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('field.name') }}</th>
                                    <th>{{ __('field.email') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['course']['student'] as $student)
                                    <tr>
                                        <td>{{ $student->user->name }}</td>
                                        <td>{{ $student->user->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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