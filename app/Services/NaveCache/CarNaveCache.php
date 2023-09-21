<?php

namespace App\Services\NaveCache;

use App\Interfaces\CarRepositoryInterface;
use App\Interfaces\NaveCacheInterface;
use App\Interfaces\PageRepositoryInterface;

class CarNaveCache extends BaseNaveCache implements NaveCacheInterface {
    protected $carRepository;

    public function __construct(CarRepositoryInterface $carRepository) {
        $this->carRepository = $carRepository;
    }
    
    public function run() {        
        $this->setAll();    
        $this->seoConfiguration();  
        $this->insurances();      
    } 
    
    public function getRepository()
    {
        return $this->carRepository;
    }  

    /**
     * Calls the seoConfiguration method for all authors
     */
    protected function seoConfiguration() {        
        $this->log('calling seoConfiguration');

        $pageRepository = app(PageRepositoryInterface::class); 
        $pageRepository->setRefreshCache($this->refreshCache);
        
        foreach($pageRepository->all('car') as $page) {
        
            $this->log('calling seoConfiguration for '. $page->route_name);
            
            foreach($this->all as $car) {
                $this->carRepository->seoConfiguration($car->hashid, $page->route_name);
            }
        }        
    }

    /**
     * Calls the insurances endpoint method for all cars
     */
    protected function insurances() {        
        $this->log('calling insurances');
            
        foreach($this->all as $car) {
            $this->carRepository->insurances($car->hashid);
        }               
    }
}