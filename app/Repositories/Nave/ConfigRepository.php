<?php

namespace App\Repositories\Nave;

use App\Interfaces\ConfigRepositoryInterface;
use App\Repositories\Nave\BaseRepository;

class ConfigRepository extends BaseRepository implements ConfigRepositoryInterface {
    
    public function currencies(): array {
        $endpoint = 'config';
        
        return $this->processCurrenciesResponse($this->processGet($endpoint, [], self::CACHED));
    }   

    public function processCurrenciesResponse($response) {                

        if(isset($response['currencies'])) {
            return $response['currencies']['data'];
        }

        return [];
    }
    
}
