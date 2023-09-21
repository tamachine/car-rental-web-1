<?php

namespace App\Services\NaveCache;

use App\Interfaces\InsuranceFeatureRepositoryInterface;
use App\Interfaces\NaveCacheInterface;

class InsuranceFeatureNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $insuranceFeatureRepository;

    public function __construct(InsuranceFeatureRepositoryInterface $insuranceFeatureRepository) {
        $this->insuranceFeatureRepository = $insuranceFeatureRepository;
    }
    
    public function run() {        
        $this->setAll();                               
    }

    public function getRepository()
    {
        return $this->insuranceFeatureRepository;
    }    
}