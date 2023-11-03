<?php

namespace App\Services\SelectableFull;

interface SelectableFullComponentInterface {

     /**
     * @return SelectableFullItem[]
     */
    public function getItems(): array;

    /**
     * Item to be selected by default
     */
    public function getSelectedItem($selectedValue): SelectableFullItem;

    /**
     * selectable full Item value for the 'All items'
     */
    public function getAllItemValue();

    /**
     * title of the selectable
     */
    public function getTitle(): string;

    /**
     * Icon to show next to the title
     */
    public function getIconPath(): ?string;

    /**
     * value to be selected by default
     */
    public function getDefaultSelectedValue(): ?string;

    public function toJson();

    public function getInstance(): ?string; //the name used for translations and CarsFilters method in all SelectableFullAbstract extended classes    
}

?>