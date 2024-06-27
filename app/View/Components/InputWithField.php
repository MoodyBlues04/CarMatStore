<?php

namespace App\View\Components;

use Illuminate\View\Component;

abstract class InputWithField extends Component
{
    public string $field;
    public string $label;
    public bool $isRequired;

    /**
     * Create a new component instance.
     */
    public function __construct(string $field, ?string $label = null, bool $isRequired = true)
    {
        $this->field = $field;
        $this->label = $label ?? $this->getFieldLabel($field);
        $this->isRequired = $isRequired;
    }

    private function getFieldLabel(string $field): string
    {
        $labelField = str_replace('_', ' ', $field);
        return ucfirst($labelField);
    }
}
