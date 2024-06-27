<?php
/**
 * @var string $field
 * @var ?string $label
 * @var bool $isSelected
 */

$label = $label ?? ucfirst(str_replace('_', ' ', $field));

?>

<div class="row md-3">
    <label class="col-md-4 col-form-label text-md-end" style="margin-top: -9px" for="{{ $field }}">{{ $label }}</label>

    <div class="col-md-4">
        <div class="row">
            <div class="input-group col-md-6">
                <span class="input-group-addon">
                    <input type="checkbox" name="{{ $field }}" {{ $isSelected ? 'checked' : '' }}>
                </span>
            </div>
        </div>
    </div>
</div>
