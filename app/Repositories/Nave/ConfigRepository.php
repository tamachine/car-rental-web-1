<?php

namespace App\Repositories\Nave;

use App\Interfaces\ConfigRepositoryInterface;
use Nave; 
use App\Repositories\Nave\BaseRepository;

class ConfigRepository extends BaseRepository implements ConfigRepositoryInterface {
    
    public function currencies(): array {
        $endpoint = 'config';

        $response = Nave::get($endpoint);

        return $this->processCurrenciesResponse($response);
    }   
    
    protected function processCurrenciesResponse($response) {
        
        $response = $this->processResponse($response);

        if(isset($response['currencies'])) {
            return $response['currencies']['data'];
        }

        return [];
    }
}
