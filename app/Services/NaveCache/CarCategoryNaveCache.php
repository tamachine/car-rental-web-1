<?php

namespace App\Services\NaveCache;

use App\Interfaces\CarCategoryRepositoryInterface;
use App\Interfaces\NaveCacheInterface;

class CarCategoryNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $carCategoryRepository;

    public function __construct(CarCategoryRepositoryInterface $carCategoryRepository) {
        $this->carCategoryRepository = $carCategoryRepository;
    }
    
    public function run() {
        
        $this->setAll();                    
    }

    public function getRepository()
    {
        return $this->carCategoryRepository;
    }    


    
}