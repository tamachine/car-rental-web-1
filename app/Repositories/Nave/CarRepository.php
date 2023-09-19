<?php

namespace App\Repositories\Nave;

use App\Interfaces\CarRepositoryInterface;
use App\Models\CarSearch;
use App\Repositories\Nave\BaseRepository;

class CarRepository extends BaseRepository implements CarRepositoryInterface {
    
    public function search(array $types, array $specs, array $dates, array $locations): CarSearch {
        $endpoint = 'car-search';

        $params['types'] = $types;
        $params['specs'] = $specs;
        $params['dates'] = $dates;
        $params['locations'] = $locations;

        return CarSearch::processSingleResponse($this->processGet($endpoint, $params, self::SHORT_TIME_CACHED)); 
    }   
}