<?php

/** @var string $field */
/** @var string $label */
/** @var bool $isRequired */
?>

<div class="row mb-3">
    <label for="{{ $field }}" class="col-md-4 col-form-label text-md-end">{{ $label }}</label>

    <div class="col-md-6">
        <input id="{{ $field }}" type="file"
            class="form-control @error('{{ $field }}') is-invalid @enderror" name="{{ $field }}"
            {{ $isRequired ? 'required' : '' }} autofocus {{ $attributes }}>

        @error($field)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
