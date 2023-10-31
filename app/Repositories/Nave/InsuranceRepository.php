<?php

namespace App\Repositories\Nave;

use App\Interfaces\InsuranceRepositoryInterface;
use App\Models\CarInsurance;
use App\Repositories\Nave\BaseRepository;

class InsuranceRepository extends BaseRepository implements InsuranceRepositoryInterface {
    
    public function all(): array {          
        $endpoint = 'insurances';
        
        return CarInsurance::processResponse($this->processGet($endpoint, [], self::CACHED));
    }      
    
}
