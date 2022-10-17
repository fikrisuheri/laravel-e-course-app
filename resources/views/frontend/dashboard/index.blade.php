@extends('layouts.frontend.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <h4 class="card-title">Bergabung Menjadi Mitra Kami</h4>
                    <p class="card-text">
                     Buatlah Kursus Dan Dapatkan Penghasilan Sebagai Mitra Kami!
                    </p>
                  </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                  <span></span>
                  <a href="{{ route('frontend.mitra.register') }}" class="btn btn-primary">Bergabung Jadi Mitra</a>
                </div>
              </div>
        </div>
    </div>
@endsection