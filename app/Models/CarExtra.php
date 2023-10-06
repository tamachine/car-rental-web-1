<?php

namespace App\Models;

use App\Helpers\ArrayHelper;
use App\Traits\Nave\HasResponses;

class CarExtra {

    use HasResponses {
        processSingleResponse as traitProcessSingleResponse;
    }

    public $hashid; 
    public $vendor_id; 
    public $name; 
    public $description; 
    public $order_appearance;
    public $image; 
    public $price; 
    public $maximum_fee; 
    public $max_units; 
    public $price_mode;
    public $category; 
    public $included; 
    public $insurance_premium; 
    public $caren_id; 
    public $price_from;   
    public $getFeaturedImageModelImageInstance;
    public $featured_image_url;

    public function toArray() {
        return get_object_vars($this);
    }
    
    public function toJson() {
        return json_encode($this);
    }

    public static function toObject(array $instanceData) {
        return ArrayHelper::mapArrayToObject($instanceData, self::class); 
    }

    /**
    * overrides processSingleResponse from Hasresponses trait
    */
    public static function processSingleResponse(array|null $instanceData): object {
        $carExtraObject = self::traitProcessSingleResponse($instanceData);     
            
        if(isset($instanceData['getFeaturedImageModelImageInstance'])) $carExtraObject->getFeaturedImageModelImageInstance = Image::processSingleResponse($instanceData['getFeaturedImageModelImageInstance']);   
            
        return $carExtraObject;
    }
}