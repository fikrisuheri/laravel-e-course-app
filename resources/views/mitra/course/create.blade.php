@extends('layouts.user.app')
@section('content')
    <form action="{{ route('frontend.mitra.course.store') }}" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">{{ __('button.add') }} {{ __('sidebar.course') }}</h4>
                <div class="card-header-action">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">{{ __('button.back') }}</a>
                </div>
            </div>
            <div class="card-body">

                @csrf
                <x-forms.input name="name" id="name" :isRequired="true" :label="__('field.course_name')" />
                <x-forms.select name="categorie_id" id="categorie_id" :isRequired="true" :label="__('field.course_category')">
                    @foreach ($data['category'] as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-forms.select>
                <x-forms.select name="type" id="type" :isRequired="true" :label="__('field.course_type')">
                    <option value="">-- Select --</option>
                    <option value="0">Gratis</option>
                    <option value="1">Berbayar</option>
                </x-forms.select>
                <x-forms.input type="number" name="price" id="price" :isRequired="true" value="0"
                    :label="__('field.course_price')" />
                <x-forms.input type="file" name="image" id="image" :isRequired="true" :label="__('field.image')" />
                <x-forms.input type="textarea" name="description" id="description" :isRequired="true" :label="__('field.description')" />
                <x-forms.input type="number" name="" id="total_video" :isRequired="true" :label="__('Total Video')" />
                <span id="message-total"></span>
                <div class="text-end">
                    <button type="button" id="btnProcess" class="btn btn-success">{{ __('button.process') }}</button>
                </div>
    </div>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Item {{ __('sidebar.course') }}</h4>
        </div>
        <div class="card-body" id="form-detail">

        </div>
    </div>
    </form>
@endsection
@push('js')
    <script>
        $('#type').on('change', function() {
            var type = $(this).find(":selected").val();
            if (type == 0) {
                $('#price').attr('readonly', true);
                $('#price').val('0');
            } else {
                $('#price').removeAttr('readonly');
            }
        });
        $('#btnProcess').on('click', function() {
            
            $('#form-detail').empty();
            var total_video = parseInt($('#total_video').val())
            console.log(total_video);
            if(isNaN(total_video)){
                $('#message-total').text('Harap Isi Total Video!');
            }else{
                $('#message-total').text('');
                for (var i = 1; i <= total_video; i++) {
                $('#form-detail').append(`
                <fieldset class="mb-3">
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">` + i + `</span>
                        </div>
                        <input type="text" name="detail_name[]" aria-label="Judul Video" class="form-control" placeholder="Judul Video" required>
                        <input type="text" name="detail_link[]" aria-label="Url Youtube" class="form-control" placeholder="Url Youtube" required>
                        <input type="text" name="duration[]" aria-label="Url Youtube" class="form-control" placeholder="Durasi" required>
                        </div>
                </fieldset>   
        `)
            }
            $('#form-detail').append(`
            <div class="text-end">
                    <button type="submit" class="btn btn-primary">{{ __('button.save') }}</button>
                </div>
            `)
            }
        })
    </script>
@endpush
