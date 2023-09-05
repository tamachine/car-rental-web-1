<?php

namespace App\Repositories\Nave;

use App\Interfaces\LocationRepositoryInterface;
use App\Repositories\Nave\BaseRepository;
use App;
use App\Helpers\ArrayHelper;
use App\Models\Location;
use App\Models\Image;
use App\Traits\Nave\SearchInAll;
use App\Traits\Nave\HasObjectResponses;

class LocationRepository extends BaseRepository implements LocationRepositoryInterface {
    
    use HasObjectResponses;

    use SearchInAll {
        findByHashid as protected findByHashidFromSearchInAll;
    }

    public function all($locale = null): array {          
        $params['locale'] = $locale ? $locale : App::getLocale();

        $endpoint = 'locations';
        
        return $this->processLocationResponse($this->processGet($endpoint, $params, self::CACHED));
    }      

    public function findByHashid($hashId, $locale = null): Location|null {
        return $this->findByHashidFromSearchInAll($hashId, $locale);
    }
   
    protected function processLocationResponse($data): array {
        $response = [];

        foreach($data as $location) {
            $locationObject = ArrayHelper::mapArrayToObject($location, Location::class);     
            
            $locationObject->getFeaturedImageModelImageInstance = ArrayHelper::mapArrayToObject($location['getFeaturedImageModelImageInstance'], Image::class);   
            
            $response[] = $locationObject;
        }
        
        return $response;
    }
}
