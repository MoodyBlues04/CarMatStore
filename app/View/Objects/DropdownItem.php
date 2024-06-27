<?php

namespace App\View\Objects;

class DropdownItem
{
    public function __construct(public string $label, public mixed $value)
    {
    }
}
