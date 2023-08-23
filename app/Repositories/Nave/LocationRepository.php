<?php

namespace App\Repositories\Nave;

use App\Interfaces\LocationRepositoryInterface;
use App\Repositories\Nave\BaseRepository;
use App;

class LocationRepository extends BaseRepository implements LocationRepositoryInterface {
    
    public function all($locale = null): array {     
        $params['locale'] = $locale ? $locale : App::getLocale();

        $endpoint = 'locations';
        
        return $this->processGet($endpoint, $params);
    }
   
}
