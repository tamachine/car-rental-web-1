<?php

namespace App\Repositories\Nave;

use App\Interfaces\CarFiltersRepositoryInterface;
use App\Models\CarEngine;
use App\Models\CarRoad;
use App\Models\CarSeat;
use App\Models\CarTransmission;
use App\Models\CarType;
use App\Repositories\Nave\BaseRepository;

class CarFiltersRepository extends BaseRepository implements CarFiltersRepositoryInterface {    

    public function all(): array {
        $endpoint = 'car-filters';

        return $this->processGet($endpoint, [], self::CACHED);
    }  

    public function types(): array {
        $all = $this->all();
        
        if(isset($all['types'])) return CarType::processResponse($all['types']);
        
        return [];
    }

    public function transmissions(): array {
        $all = $this->all();
        
        if(isset($all['transmissions'])) return CarTransmission::processResponse($all['transmissions']);
        
        return [];
    }

    public function roads(): array {
        $all = $this->all();
        
        if(isset($all['roads'])) return CarRoad::processResponse($all['roads']);
        
        return [];
    }

    public function seats(): array {
        $all = $this->all();
        
        if(isset($all['seats'])) return CarSeat::processResponse($all['seats']);
        
        return [];
    }

    public function engines(): array {
        $all = $this->all();
        
        if(isset($all['engines'])) return CarEngine::processResponse($all['engines']);
        
        return [];
    }     
}
