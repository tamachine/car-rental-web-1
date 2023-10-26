<?php

namespace App\Services\NaveCache;

use App\Interfaces\InsuranceRepositoryInterface;
use App\Interfaces\NaveCacheInterface;

class InsuranceNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $insuranceRepository;

    public function __construct(InsuranceRepositoryInterface $insuranceRepository) {
        $this->insuranceRepository = $insuranceRepository;
    }
    
    public function run() {        
        $this->setAll();                                 
    }

    public function getRepository()
    {
        return $this->insuranceRepository;
    }    
}