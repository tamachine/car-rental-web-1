<?php

namespace App\Repositories\Nave;

use App\Repositories\Nave\BaseRepository;
use App\Interfaces\InsuranceFeatureRepositoryInterface;
use App\Models\InsuranceFeature;

class InsuranceFeatureRepository extends BaseRepository implements InsuranceFeatureRepositoryInterface {
    
    public function all(): array {          
        $endpoint = 'insurance-features';
        
        return InsuranceFeature::processResponse($this->processGet($endpoint, [], self::CACHED));
    }      
    
}
