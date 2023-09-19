<?php

namespace App\Services\NaveCache;

use App\Interfaces\CarFiltersRepositoryInterface;
use App\Interfaces\NaveCacheInterface;

class CarFiltersNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $carFiltersRepository;

    public function __construct(CarFiltersRepositoryInterface $carFiltersRepository) {
        $this->carFiltersRepository = $carFiltersRepository;
    }
    
    public function run() {        
        $this->setAll();             
    } 
    
    public function getRepository()
    {
        return $this->carFiltersRepository;
    }  
}