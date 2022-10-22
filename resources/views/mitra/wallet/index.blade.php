@extends('layouts.user.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">{{ __('sidebar.wallet') }}</h4>
                    @if ($data['wallet']['balance'] > 0)
                    <button type="button" data-bs-toggle="modal" data-bs-target="#modalWD"
                    class="btn btn-primary">{{ __('button.witdraw') }}</button>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table>
                                <tr>
                                    <th>{{ __('field.wallet_balance') }}</th>
                                    <td>: {{ $data['wallet']['balance_rupiah'] }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">{{ __('sidebar.witdrawal') }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered show-datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('field.date') }}</th>
                                    <th>{{ __('field.amount') }}</th>
                                    <th>{{ 'Status' }}</th>
                                    <th>{{ __('field.description') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['penarikan'] as $penarikan)
                                    <tr>
                                        <td>{{ $penarikan->created_at }}</td>
                                        <td>{{ $penarikan->amount }}</td>
                                        <td>{!! $penarikan->html_status !!}</td>
                                        <td>{{ $penarikan->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade text-left" id="modalWD" tabindex="-1" role="dialog" aria-labelledby="titleModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleModal">
                        {{ __('button.witdraw') }}
                    </h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ route('frontend.mitra.wallet.withdraw') }}" method="POST">
                    @csrf

                    <div class="modal-body" id="bodyModal">
                        <x-forms.input :label="__('field.amount')" name="amount" :isRequired="true" />
                        <x-forms.input :label="__('field.withdraw_bank')" name="description" :isRequired="true" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">{{ __('button.close') }}</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">{{ __('button.process') }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $('.show-datatable').DataTable()
    </script>
@endpush
