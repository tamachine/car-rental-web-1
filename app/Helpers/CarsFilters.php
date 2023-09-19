<?php

namespace App\Helpers;

use App\Interfaces\CarFiltersRepositoryInterface;
use App\Models\CarTransmission;

class CarsFilters
{            
    public static function transmissions() {
        $transmissions = app(CarFiltersRepositoryInterface::class)->transmissions();        

        return collect($transmissions)->pluck('id');
    }  

    public static function roads() {
        $roads = app(CarFiltersRepositoryInterface::class)->roads();     
        
        return collect($roads)->pluck('id');
    }  
    
    public static function seats() {
        $seats = app(CarFiltersRepositoryInterface::class)->seats();   
        
        return collect($seats)->pluck('id');
    }  

    public static function engines() {        
        $engines = app(CarFiltersRepositoryInterface::class)->engines(); 

        return collect($engines)->pluck('id');
    }  

    /**
     * return the default value for the element 'all'
     */
    public static function defaultAllItemValue():?string {
        return null;
    }

    public static function getTransmissionsInstance():string {
        return 'transmission';
    }

    public static function getRoadsInstance():string {
        return 'road';
    }

    public static function getEnginesInstance():string {
        return 'engine';
    }

    public static function getSeatsInstance():string {
        return 'seat';
    }

    /**
     * return the icon path for the filters
     * $instance string => transmission, road, seat, engine ...
     */
    public static function getIconPath($instance):string {
        return asset('images/cars/filters/'.$instance.'.svg');
    }

    /**
     * return the translation for the filters
     * $instance string => transmission, road, seat, engine ...
     */
    public static function getTranslation($instance):string {
        return __('cars.filters-'. $instance);        
    }
}
