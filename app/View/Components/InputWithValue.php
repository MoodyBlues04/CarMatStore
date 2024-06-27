<?php

namespace App\View\Components;

abstract class InputWithValue extends InputWithField
{
    public mixed $value;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $field,
        ?string $label = null,
        bool $isRequired = true,
        mixed $value = null
    ) {
        parent::__construct($field, $label, $isRequired);
        $this->value = $value;
    }
}
