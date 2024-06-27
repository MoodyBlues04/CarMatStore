<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;

class DeleteButton extends BaseEditButton
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-button');
    }
}
