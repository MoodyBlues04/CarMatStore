<?php

namespace App\View\Components;

use App\View\Objects\DropdownItem;
use App\View\Objects\ToDropdownItemInterface;
use Closure;
use Illuminate\Contracts\View\View;

class InputDropdown extends InputWithDropdownItems
{
    public string $field;

    /** @var DropdownItem[] */
    public array $items;

    public mixed $selectedValue;
    public string $labelField;
    public bool $isRequired;

    /**
     * Create a new component instance.
     *
     * @param string $field field name
     * @param DropdownItem[]|ToDropdownItemInterface[] $items
     * @param mixed $selectedValue if specified, item with ```$item['value'] === $selectedValue``` will be marked as selected
     * @param string|null $labelField
     * @param bool $isRequired
     */
    public function __construct(
        string $field,
        array $items,
        mixed $selectedValue = null,
        ?string $labelField = null,
        bool $isRequired = false)
    {
        $this->labelField = $labelField ?? $field;
        $this->isRequired = $isRequired;
        parent::__construct($field, $items);
        $this->selectedValue = $selectedValue;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-dropdown');
    }
}
