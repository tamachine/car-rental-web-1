<?php

namespace App\Services\SelectableFull;

use App\Services\SelectableFull\SelectableFullComponentInterface;
use App\Helpers\CarsFilters;
use JsonSerializable;
/**
 * Class to return a selectable full component 
 */

abstract class SelectableFullAbstract implements SelectableFullComponentInterface, JsonSerializable
{    
    protected $instance; //the name used for translations, icons and CarsFilters method
    protected $instancePluralized;
    protected $items = []; 

    public function __construct() {
        $this->setInstance();
        $this->setInstancePluralized();
        $this->setItems();
    }

     /**
     * @return SelectableFullItem[]
     */
    public function getItems(): array {
        return $this->items;    
    }  

    /**
     * Item to be selected by default
     */
    public function getSelectedItem($selectedValue): SelectableFullItem
    {        
        return $this->getItems()[$selectedValue];
    }        

    /**
     * selectable full Item value for the 'All items'
     */
    public function getAllItemValue() {
        return CarsFilters::defaultAllItemValue();
    }

    /**
     * title of the selectable
     */
    public function getTitle(): string {
        return CarsFilters::getTranslation($this->instance);
    }   

    /**
     * Icon to show next to the title
     */
    public function getIconPath(): ?string {
        return CarsFilters::getIconPath($this->instance);
    } 

    /**
     * value to be selected by default
     */
    public function getDefaultSelectedValue(): ?string {
        return $this->getAllItemValue();
    }

    public function jsonSerialize () {
        return array(
            'instance'  => $this->instance,                     
        );
    }

    public function toJson() {
        return json_encode($this);
    }

    protected function setInstance() {
        $this->instance = $this->getInstance();
    }

    protected function setInstancePluralized() {
        $this->instancePluralized = $this->instance .'s';
    }

    /**
     * Set all selectable full items and add the 'All' item at the beginning
     */
    protected function setItems() {        
        $items = call_user_func('\App\Helpers\CarsFilters::'.$this->instancePluralized);

        foreach($items as $item) {            
            $selectableFullItem = $this->getItem(__('cars.filters-'.$this->instance.'-'.$item), $item);
            $this->items[$selectableFullItem->value] = $selectableFullItem;
        } 

        $this->addAllItem();
    }    

    protected function getItem($text, $value): SelectableFullItem {
        $item = new SelectableFullItem();
        $item->text = $text;
        $item->value = $value;        

        return $item;
    }    

    /**
     * Method to add the 'All' SelectableFullItem to the items array
     */
    protected function addAllItem($translationPath = 'cars.filters-all') {
        $allItem = $this->getItem(__($translationPath), $this->getAllItemValue());

        $this->items = [$allItem->value => $allItem] + $this->items;
    }    
}
?>