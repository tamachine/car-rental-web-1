<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\SelectableFull\SelectableFullComponentInterface;

class SelectableFull extends Component
{
    public $selectableFullComponent;
    public $selectedValue;
    public $itemWireClickEvent;

    protected $items;
    protected $selectedItem;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(SelectableFullComponentInterface $selectableFullComponent, $itemWireClickEvent = null, $selectedValue = null)
    {
        $this->selectableFullComponent = $selectableFullComponent;
        $this->selectedValue = $selectedValue ?? $this->selectableFullComponent->getDefaultSelectedValue();
        $this->itemWireClickEvent = $itemWireClickEvent;

        $this->items = $this->selectableFullComponent->getItems();
        $this->selectedItem = $this->selectableFullComponent->getSelectedItem($this->selectedValue);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {                        
        return view('components.selectable-full', 
            [
                'items' => $this->items,
                'title' => $this->selectableFullComponent->getTitle(),
                'iconPath' => $this->selectableFullComponent->getIconPath(),
                'selectedItem' => $this->selectedItem,
                'allValue' => $this->selectableFullComponent->getAllItemValue(),
            ]);
    }

    /**
     * @return string[]
     */
    protected function getItemsForButton() {
        return "['".implode("','", array_column($this->items, 'text')). "']";
    }
}
