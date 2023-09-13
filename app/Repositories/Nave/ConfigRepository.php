<?php

namespace App\Repositories\Nave;

use App\Interfaces\ConfigRepositoryInterface;
use Nave; 
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\HasObjectResponses;

class ConfigRepository extends BaseRepository implements ConfigRepositoryInterface {
    
    use HasObjectResponses;

    public function currencies(): array {
        $endpoint = 'config';
        
        return $this->processCurrenciesResponse($this->processGet($endpoint, [], self::CACHED));
    }   
    
}
