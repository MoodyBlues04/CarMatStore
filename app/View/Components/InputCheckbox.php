<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\View\View;

class InputCheckbox extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $field, public ?string $label = null, public bool $isSelected = false)
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-checkbox');
    }
}
