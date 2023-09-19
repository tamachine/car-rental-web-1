<?php

namespace App\Repositories\Nave;

use App\Repositories\Nave\BaseRepository;
use App\Interfaces\CarenLocationRepositoryInterface;
use App\Models\CarenLocation;

class CarenLocationRepository extends BaseRepository implements CarenLocationRepositoryInterface {
    
   public function all(): array {          
        $endpoint = 'caren-locations';
        
        return CarenLocation::processResponse($this->processGet($endpoint, [], self::CACHED));
    }          

    public function firstNotNull($attribute): CarenLocation|null {
        return collect($this->all())->filter(function ($location) use ($attribute) {
            return $location->$attribute != null;
        })->first();
    } 
    
}
