<?php

namespace App\View\Components;

use App\View\Objects\DropdownItem;
use App\View\Objects\ToDropdownItemInterface;
use Closure;
use Illuminate\Contracts\View\View;

class InputRadio extends InputWithDropdownItems
{
    public string $field;

    /** @var DropdownItem[] */
    public array $items;

    public ?string $selectedValue;
    public bool $isRequired;
    public string $labelField;

    /**
     * Create a new component instance.
     *
     * @param string $field field name
     * @param DropdownItem[]|ToDropdownItemInterface[] $items
     * @param ?string $selectedValue
     * @param bool $isRequired
     * @param string|null $labelField
     */
    public function __construct(
        string  $field,
        array   $items,
        ?string $selectedValue = null,
        bool    $isRequired = false,
        ?string $labelField = null)
    {
        $this->labelField = $labelField ?? $field;
        parent::__construct($field, $items);
        $this->selectedValue = $selectedValue;
        $this->isRequired = $isRequired;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-radio');
    }
}
