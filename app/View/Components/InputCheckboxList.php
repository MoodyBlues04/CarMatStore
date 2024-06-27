<?php

namespace App\View\Components;

use App\View\Objects\DropdownItem;
use App\View\Objects\ToDropdownItemInterface;
use Closure;
use Illuminate\Contracts\View\View;

class InputCheckboxList extends InputWithDropdownItems
{
    public string $field;

    /** @var DropdownItem[] */
    public array $items;

    public array $selectedValues;

    /**
     * Create a new component instance.
     *
     * @param string $field field name
     *
     * @param DropdownItem[]|ToDropdownItemInterface[] $items
     *
     * @param array $selectedValues
     * if specified, item with ```in_array($item['value'], $selectedValues)``` will be marked as selected
     */
    public function __construct(string $field, array $items, array $selectedValues = [])
    {
        parent::__construct($field, $items);
        $this->selectedValues = $selectedValues;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-checkbox-list');
    }
}
