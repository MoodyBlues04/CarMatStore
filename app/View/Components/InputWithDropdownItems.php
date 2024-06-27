<?php

namespace App\View\Components;

use App\View\Objects\DropdownItem;
use App\View\Objects\ToDropdownItemInterface;
use Illuminate\View\Component;

abstract class InputWithDropdownItems extends Component
{
    public string $field;

    /** @var DropdownItem[] */
    public array $items;

    /**
     * Create a new component instance.
     *
     * @param string $field field name
     * @param DropdownItem[]|ToDropdownItemInterface[] $items
     */
    public function __construct(string $field, array $items)
    {
        $this->field = $field;
        $this->items = $this->getDropdownItems($items);
    }

    /**
     * @param DropdownItem[]|ToDropdownItemInterface[] $items
     */
    private function getDropdownItems(array $items): array
    {
        return array_map(function (DropdownItem|ToDropdownItemInterface $item) {
            return ($item instanceof DropdownItem) ? $item : $item->toDropdownItem();
        }, $items);
    }
}
