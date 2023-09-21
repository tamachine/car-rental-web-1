<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;

class CarInsurance {

    use HasResponses {
        processSingleResponse as traitProcessSingleResponse;
    }

    public $hashid;
    public $active; 
    public $name;
    public $description;
    public $image;
    public $color;
    public $price_mode;
    public $features;
    public $price;
    public $caren_id;

    /**
     * overrides processSingleResponse from Hasresponses trait
     */
    public static function processSingleResponse(array|null $instanceData): object {
        $insuranceObject = self::traitProcessSingleResponse($instanceData);     
            
        if(isset($instanceData['image'])) $insuranceObject->image = Image::processSingleResponse($instanceData['image']);   
        $insuranceObject->features = InsuranceFeature::processResponse($instanceData['features']);   
            
        return $insuranceObject;
    }

    public function toJson() {
        return json_encode($this);
    }

    /**
     * Checks if the CarInsurance contains the insuranceFeature
     * @param InsuranceFeature $feature The InsuranceFeature to be checked
     * @return bool
     */
    public function containsFeature(InsuranceFeature $feature) {        
        return collect($this->features)->contains('hashid', $feature->hashid);
    }

}