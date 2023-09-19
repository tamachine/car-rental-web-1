<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;

class CarenLocation {

    use HasResponses {
        processSingleResponse as traitProcessSingleResponse;
    }

    public $name;
    public $caren_pickup_location_id;
    public $caren_dropoff_location_id;
    public $location;

    /**
     * overrides processSingleResponse from Hasresponses trait
     */
    public static function processSingleResponse(array|null $instanceData): object {
        $locationObject = self::traitProcessSingleResponse($instanceData);     
            
        if (isset($instanceData['location'])) $locationObject->location = Location::processSingleResponse($instanceData['location']);   
            
        return $locationObject;
    }
    
}
