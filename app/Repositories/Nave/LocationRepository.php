<?php

namespace App\Repositories\Nave;

use App\Interfaces\LocationRepositoryInterface;
use App\Repositories\Nave\BaseRepository;
use App;
use App\Helpers\ArrayHelper;
use App\Models\Location;
use App\Models\Image;

class LocationRepository extends BaseRepository implements LocationRepositoryInterface {
    
    public function all($locale = null): array {          
        $params['locale'] = $locale ? $locale : App::getLocale();

        $endpoint = 'locations';
        
        return $this->processLocationResponse($this->processGet($endpoint, $params, self::CACHED));
    }
   
    protected function processLocationResponse($data): array {
        $response = [];

        foreach($data as $location) {
            $locationObject = ArrayHelper::mapArrayToObject($location, Location::class);

            $image = $location['getFeaturedImageModelImageInstance'];

            if($image) {
                $imageObject = ArrayHelper::mapArrayToObject($image, Image::class);                
            } else {
                $imageObject = new Image();
            }

            $locationObject->getFeaturedImageModelImageInstance = $imageObject;
            
            $response[] = $locationObject;
        }
        
        return $response;
    }
}
