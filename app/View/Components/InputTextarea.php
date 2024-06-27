<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;

class InputTextarea extends InputWithValue
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-textarea');
    }
}
