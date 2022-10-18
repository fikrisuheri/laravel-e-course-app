<div class="form-group mb-2">

    <label for="{{ $id }}">{{ $label }}</label>

    <select name="{{ $name }}" id="{{ $id }}" class="form-control @error($name) is-invalid @enderror" {{ $isRequired ? 'required' : '' }}>
        {{ $slot }}
    </select>


    @if ($hintText)
        <small class="form-text text-muted">{{ $hintText }}</small>
    @endif

    {{-- Dengan Bantuan Error Bag dari Laravel --}}
    @error($name)
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror

</div>