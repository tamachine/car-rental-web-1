<?php

namespace App\Models;

use App\Models\Image;
use App\Traits\Nave\HasResponses;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class Car implements LocalizedUrlRoutable {

    use HasResponses {
        processSingleResponse as traitProcessSingleResponse;
    }

    public $hashid;
    public $active;
    public $name;
    public $description;
    public $year;
    public $ranking;
    public $fleet_position;
    public $users_number_votes;
    public $adult_passengers;
    public $doors;
    public $luggage;
    public $beds;
    public $kitchen;
    public $heater;
    public $engine;
    public $transmission;
    public $vehicle_type;
    public $vehicle_brand;
    public $f_roads_name;
    public $featured_image;
    public $featured_image_hover;
    public $getFeaturedImageModelImageInstance;
    public $getFeaturedImagaHoverModelImageInstance;
    public $fRoadAllowed;
    public $daily_price;
    public $total_price;
    public $caren_settings;

    /**
     * overrides processSingleResponse from Hasresponses trait
     */
    public static function processSingleResponse(array|null $instanceData): object {
        $locationObject = self::traitProcessSingleResponse($instanceData);

        if(isset($instanceData['getFeaturedImageModelImageInstance']))      $locationObject->getFeaturedImageModelImageInstance = Image::processSingleResponse($instanceData['getFeaturedImageModelImageInstance']);
        if(isset($instanceData['getFeaturedImagaHoverModelImageInstance'])) $locationObject->getFeaturedImagaHoverModelImageInstance = Image::processSingleResponse($instanceData['getFeaturedImagaHoverModelImageInstance']);

        return $locationObject;
    }

    public function getLocalizedRouteKey($locale)
    {
        return $this->hashid;
    }
}
