<?php
/** @var string $field */
/** @var \App\View\Components\ToDropdownItemInterface[] $items */
/** @var ?string $selectedValue */

?>

<div class="row md-3">
    <label class="col-md-4 col-form-label text-md-end" for="{{ $field }}">{{ $labelField }}</label>

    <div class="col-md-4">
        <div class="row">
            @foreach ($items as $idx => $item)
                <div class="input-group col-md-6">
                    <label class="form-control col-md-6">
                        <span class="input-group-addon">
                            <input type="radio" name="{{ $field }}" value="{{ $item->value }}"
                                {{ !is_null($selectedValue) && $item->value == $selectedValue
                                    ? 'checked' : '' }} {{ $isRequired ? 'required' : '' }}>
                        </span>
                        {{ $item->label }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>
