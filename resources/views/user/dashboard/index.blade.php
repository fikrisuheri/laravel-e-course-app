@extends('layouts.user.app')
@section('content')
 
    <div class="row">
        <div class="col-md-12">
            @if (auth()->user()->isMitra() == false)
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
                  <a href="{{ route('frontend.mitra.register.index') }}" class="btn btn-primary">Bergabung Jadi Mitra</a>
              </div>
          </div>
            @elseif(auth()->user()->mitra->is_approved == 0)   
            <div class="card">
              <div class="card-content">
                  <div class="card-body">
                      <h4 class="card-title">Formulis Pendaftaran Mitra Berhasil Dikirim</h4>
                      <p class="card-text">
                          Pengajuanmu sedang kami tinjau, dengan segera kami akan memberitahu kamu melalui email!
                      </p>
                  </div>
              </div>
          </div>
            @endif
        </div>
    </div>
@endsection
