<?php

namespace App\Services\NaveCache;

use App\Interfaces\LocationRepositoryInterface;
use App\Interfaces\NaveCacheInterface;

class LocationNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $locationRepository;

    public function __construct(LocationRepositoryInterface $locationRepository) {
        $this->locationRepository = $locationRepository;
    }
    
    public function run() {        
        $this->setAll();                            
    }

    public function getRepository()
    {
        return $this->locationRepository;
    }    
}