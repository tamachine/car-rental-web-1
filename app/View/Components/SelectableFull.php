<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\SelectableFull\SelectableFullComponentInterface;

class SelectableFull extends Component
{
    public $mode = 'full'; 
    
    public $selectableFullComponent;
    public $selectedValue;
    public $itemWireClickEvent;    
    public $wireModel;
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
        
        $this->wireModel = $this->selectableFullComponent->getInstance();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {                        
        return view($this->getView(), 
            [
                'items' => $this->items,
                'title' => $this->selectableFullComponent->getTitle(),
                'iconPath' => $this->selectableFullComponent->getIconPath(),
                'selectedItem' => $this->selectedItem,
                'allValue' => $this->selectableFullComponent->getAllItemValue(),               
            ]);
    }

    protected function getView() {
        return 'components.selectable-full';
    }

    /**
     * @return string[]
     */
    protected function getItemsForButton() {
        return "['".implode("','", array_column($this->items, 'text')). "']";
    }
}
