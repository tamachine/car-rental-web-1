<?php

namespace App\Services\SelectableFull;

use App\Helpers\CarsFilters;
use Illuminate\Support\Facades\Route;

class CarNavbarSelectableFullComponent implements SelectableFullComponentInterface
{    
    protected $landingsCarRoutes = ['cars.small', 'cars.large', 'cars.premium'];

    public function getInstance(): ?string {
        return null;
    }

     /**
     * @return SelectableFullItem[]
     */
    public function getItems(): array {

        $items = [];

        foreach($this->landingsCarRoutes as $landingRoute) {

        
            $item = new SelectableFullItem();
            $item->text = __('navbar.'.$landingRoute);
            $item->value = route($landingRoute);        

            $items[$item->value] = $item;
        }

        return $items;
    }  

    /**
     * Item to be selected by default
     */
    public function getSelectedItem($selectedValue): SelectableFullItem
    {        
        return new SelectableFullItem();        
    }        

    /**
     * selectable full Item value for the 'All items'
     */
    public function getAllItemValue() {
        return null;
    }

    /**
     * title of the selectable
     */
    public function getTitle(): string {
        return __('navbar.cars');
    }   

    /**
     * Icon to show next to the title
     */
    public function getIconPath(): ?string {
        return null;
    } 

    /**
     * value to be selected by default
     */
    public function getDefaultSelectedValue(): ?string {

        if (in_array(Route::currentRouteName(), $this->landingsCarRoutes)) return route(Route::currentRouteName());

        return $this->getAllItemValue();
    }

    public function toJson() {
        return json_encode($this);
    }

}
?>