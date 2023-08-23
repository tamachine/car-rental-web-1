<?php

namespace App\Repositories\Nave;

use App\Interfaces\ConfigRepositoryInterface;
use Nave; 
use App\Repositories\Nave\BaseRepository;

class ConfigRepository extends BaseRepository implements ConfigRepositoryInterface {
    
    public function currencies(): array {
        $endpoint = 'config';
        
        return $this->processCurrenciesResponse($this->processGet($endpoint));
    }   
    
    protected function processCurrenciesResponse($response) {                

        if(isset($response['currencies'])) {
            return $response['currencies']['data'];
        }

        return [];
    }
}
