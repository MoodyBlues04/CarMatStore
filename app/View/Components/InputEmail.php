<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;

class InputEmail extends InputWithValue
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-email');
    }
}
