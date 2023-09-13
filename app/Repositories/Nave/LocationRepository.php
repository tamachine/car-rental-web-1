<?php

namespace App\Repositories\Nave;

use App\Interfaces\LocationRepositoryInterface;
use App\Repositories\Nave\BaseRepository;
use App;
use App\Models\Location;
use App\Traits\Nave\SearchInAll;

class LocationRepository extends BaseRepository implements LocationRepositoryInterface {
    
    use SearchInAll {
        findByHashid as protected findByHashidFromSearchInAll;
    }

    public function all($locale = null): array {          
        $params['locale'] = $locale ? $locale : App::getLocale();

        $endpoint = 'locations';
        
        return Location::processResponse($this->processGet($endpoint, $params, self::CACHED));
    }      

    public function findByHashid($hashId, $locale = null): Location|null {
        return $this->findByHashidFromSearchInAll($hashId, $locale);
    }
    
}
