@extends('layouts.backend.app')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title">Data {{ __('sidebar.mitra') }}</h4>
    </div>
    <div class="card-body">
       <div class="table-responsive">
            <div class="table-responsive">
                {!! $dataTable->table(['class' => 'table table-striped table-bordered']) !!}
            </div>
       </div>
    </div>
</div>
{{-- Modal Review --}}
<div class="modal fade text-left" id="modalReview" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-scrollable" role="document" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titleModal">
            Basic Modal
          </h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close" >
            <i data-feather="x"></i>
          </button>
        </div>
        <form action="{{ route('backend.feature.mitra.accept') }}" method="POST">
        @csrf
        <input type="hidden" name="mitra_id" id="mitra_id">
        <div class="modal-body" id="bodyModal">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-bs-dismiss="modal" >
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">{{ __('button.close') }}</span>
          </button>
          <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal" >
            <i class="bx bx-check d-block d-sm-none"></i>
            <span class="d-none d-sm-block">{{ __('button.accept') }}</span>
          </button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@push('js')
{!! $dataTable->scripts() !!}
<script>
     $('#modalReview').on('show.bs.modal', function(e) {
        var reference_tag = $(e.relatedTarget); 
        var name = reference_tag.data('name')   
        var id = reference_tag.data('id')   
        var description = reference_tag.data('description')   

        $('#titleModal').text(name);
        $('#mitra_id').val(id);
        $('#bodyModal').text(description);
     })
</script>
@endpush