<?php

namespace App\View\Objects;

/**
 * @property string $name
 * @property int $id
 */
trait ModelToDropdownItem
{
    public function toDropdownItem(): DropdownItem
    {
        return new DropdownItem($this->name, $this->id);
    }
}
