<?php
/** @var string $field */
/** @var ConvertableToDropdownItem[] $items */
/** @var array $selectedValues */

$labelField = str_replace('_', ' ', $field);
$labelField = ucfirst($labelField);

?>

<div class="row md-3">
    <label class="col-md-4 col-form-label text-md-end" for="{{ $field }}">{{ $labelField }}</label>

    <div class="col-md-4">
        <div class="row">
            @foreach ($items as $idx => $item)
                <div class="input-group col-md-6">
                    <label class="form-control col-md-6">
                        <span class="input-group-addon">
                            <input type="checkbox" name="{{ $field }}[]" value="{{ $item->value }}"
                                {{ in_array($item->value, $selectedValues) ? 'checked' : '' }}>
                        </span>
                        {{ $item->label }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>
