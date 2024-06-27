<?php
/** @var string $field */
/** @var \App\Interfaces\ConvertableToDropdownItem[] $items */
/** @var mixed $selectedValue */

?>

<div class="row mb-3">
    <label class="col-md-4 col-form-label text-md-end" for="{{ $field }}">{{ $labelField }}</label>

    <div class="form-group col-md-6">
        <select id="{{ $field }}" name="{{ $field }}" class="form-control" {{$isRequired === true ? 'required' : ''}}>
            @if ($selectedValue === null)
                <option selected value="{{ null }}">Select {{ $field }}</option>
            @endif
            @foreach ($items as $item)
                <option {{ $selectedValue !== null && $selectedValue === $item->value ? 'selected' : '' }}
                    value="{{ $item->value }}">
                    {{ $item->label }}
                </option>
            @endforeach
        </select>

        @error($field)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
