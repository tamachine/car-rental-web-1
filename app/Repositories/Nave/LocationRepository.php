<?php

namespace App\Repositories\Nave;

use App\Interfaces\LocationRepositoryInterface;
use App\Repositories\Nave\BaseRepository;
use App;
use App\Helpers\ArrayHelper;
use App\Models\Location;
use App\Models\Image;
use Illuminate\Support\Collection;

class LocationRepository extends BaseRepository implements LocationRepositoryInterface {
    
    public function all($locale = null): array {          
        $params['locale'] = $locale ? $locale : App::getLocale();

        $endpoint = 'locations';
        
        return $this->processLocationResponse($this->processGet($endpoint, $params, self::CACHED));
    }

    public function findByHashid($hashId, $locale = null): Location|null {
        return collect($this->all($locale))->first(function ($location) use ($hashId) {
            return $location->hashid == $hashId;
        });
    }

    public function like($attribute, $value, $locale = null): Collection|null {
        return collect($this->all($locale))->filter(function ($location) use ($attribute, $value) {
            return str_contains($value, $location->$attribute);
        })->values();
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
