@extends('layouts.backend.app')
@section('content')
    <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                          <div class="stats-icon purple mb-2">
                            <i class="iconly-boldUser1"></i>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">
                            {{ __('sidebar.user') }}
                          </h6>
                          <h6 class="font-extrabold mb-0">{{ $data['total_user'] }}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                          <div class="stats-icon blue mb-2">
                            <i class="iconly-boldUser"></i>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">{{ __('sidebar.mitra') }}</h6>
                          <h6 class="font-extrabold mb-0">{{ $data['total_mitra'] }}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                          <div class="stats-icon green mb-2">
                            <i class="iconly-boldBookmark"></i>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">{{ __('sidebar.course') }}</h6>
                          <h6 class="font-extrabold mb-0">{{ $data['total_course'] }}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                  <div class="card">
                    <div class="card-body px-4 py-4-5">
                      <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                          <div class="stats-icon red mb-2">
                            <i class="iconly-boldPaper-Download"></i>
                          </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                          <h6 class="text-muted font-semibold">{{ __('sidebar.transaction') }}</h6>
                          <h6 class="font-extrabold mb-0">{{ $data['total_transaction'] }}</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
@endsection