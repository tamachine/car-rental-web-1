<?php

namespace App\Repositories\Nave;

use App\Interfaces\CarRepositoryInterface;
use App\Models\Car;
use App\Models\CarInsurance;
use App\Models\CarSearch;
use App\Models\SeoConfiguration;
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\SearchInAll;

class CarRepository extends BaseRepository implements CarRepositoryInterface {
    
    use SearchInAll {
        findByHashid as protected findByHashidFromSearchInAll;
    }

    public function all(): array {
        $endpoint = 'car-search';

        $carSearch = CarSearch::processSingleResponse($this->processGet($endpoint, [], SELF::CACHED));

        return $carSearch->cars;
    }

    public function search(array $types, array $specs, array $dates, array $locations): CarSearch {
        $endpoint = 'car-search';

        $params['types'] = $types;
        $params['specs'] = $specs;
        $params['dates'] = $dates;
        $params['locations'] = $locations;

        return CarSearch::processSingleResponse($this->processGet($endpoint, $params, self::SHORT_TIME_CACHED)); 
    }   

    public function seoConfiguration($carHashId, $pageRouteName): SeoConfiguration { 
        $endpoint = 'cars/'.$carHashId.'/seoconfigurations/'. $pageRouteName;    

        return SeoConfiguration::processSingleResponse($this->processGet($endpoint, [], self::CACHED));
    }   

    public function findByHashid($hashId, $locale = null): Car|null {
        return $this->findByHashidFromSearchInAll($hashId, $locale);
    }

    public function insurances($carHashId): array {
        $endpoint = 'cars/'.$carHashId.'/insurances';
        
        return CarInsurance::processResponse($this->processGet($endpoint, [], self::SHORT_TIME_CACHED));
    }
}