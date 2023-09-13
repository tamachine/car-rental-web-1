<?php

namespace App\Services\NaveCache;

use App\Interfaces\ConfigRepositoryInterface;
use App\Interfaces\NaveCacheInterface;

class ConfigNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $configRepository;

    public function __construct(ConfigRepositoryInterface $configRepository) {
        $this->configRepository = $configRepository;
    }
    
    public function run() {        
        $this->configRepository->currencies();               
    } 
    
    public function getRepository()
    {
        return $this->configRepository;
    }  
}