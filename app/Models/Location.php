<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;
use App\Models\Image;

class Location {

    use HasResponses {
        processSingleResponse as traitProcessSingleResponse;
    }

    public $hashid;
    public $name;
    public $pickup_show_input;
    public $dropoff_show_input;
    public $pickup_input_require;
    public $cardropoff_input_require;
    public $getFeaturedImageModelImageInstance;  
    public $caren_settings;

    /**
     * overrides processSingleResponse from Hasresponses trait
     */
    public static function processSingleResponse(array|null $instanceData): object {
        $locationObject = self::traitProcessSingleResponse($instanceData);     
            
        $locationObject->getFeaturedImageModelImageInstance = Image::processSingleResponse($instanceData['getFeaturedImageModelImageInstance']);   
            
        return $locationObject;
    }
}
