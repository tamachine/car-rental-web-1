<?php

namespace App\Services\CarsSearch;

use App\Interfaces\LocationRepositoryInterface;

/**
 * This class validates the values in the car search bar in order to check if they are correct for the search 
 */
class ValidateCarSearchLocations {

    protected $locationFrom;

    protected $locationTo;

    protected $errors = [];

    public function __construct($locationFrom, $locationTo) {
        $this->locationFrom = $locationFrom;
        $this->locationTo = $locationTo;
        
        $this->handle();
    }

    public function check() {
        return (count($this->errors) == 0);
    }

    public function getErrors() {   
        return $this->errors;
    }

    protected function handle() {
        $locationRepository = app(LocationRepositoryInterface::class);

        if(!$locationRepository->findByHashid($this->locationFrom)) {       
            $this->errors['location-from'] = 'Location from not valid';
        };
            
        if(!$locationRepository->findByHashid($this->locationTo)) {           
            $this->errors['location-to'] = 'Location to not valid';
        };
    }
}