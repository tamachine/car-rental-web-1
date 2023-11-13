<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;

class CarSearch {

    use HasResponses {
        processSingleResponse as traitProcessSingleResponse;
    }

    public $searchByDates;
    public $cars;

    /**
     * overrides processSingleResponse from Hasresponses trait
     */
    public static function processSingleResponse(array|null $instanceData): object {
        $carSearchObject = self::traitProcessSingleResponse($instanceData);     
            
        if(isset($instanceData['cars'])) $carSearchObject->cars = Car::processResponse($instanceData['cars']) ;   
            
        return $carSearchObject;
    }
}