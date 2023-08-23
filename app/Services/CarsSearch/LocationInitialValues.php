<?php

namespace App\Services\CarsSearch;

use App\Interfaces\LocationRepositoryInterface;

/**
 * This class manages the locations that the car search bar must use taking in account the params from the url 
 */
class LocationInitialValues
{       
    protected $locations = []; //$locations[pickup' => Location hashid, 'dropoff' => hashid]    

    protected $locationRepository;
    
    public function __construct() {
        $this->locationRepository = app(LocationRepositoryInterface::class);     
        
        $this->setDefaultLocations();

        $this->setLocationsFromUrl();           
    }

    /** Returns the locations to use
     * 
     * @return array [pickup' => Location hashid, 'dropoff' => hashid]  
     */
    public function getLocations() {
        return $this->locations;        
    } 
    
     /**
     * Sets the default locations
     */
    protected function setDefaultLocations() {
        $this->locations = [
            'pickup'  => null, 
            'dropoff' => null  
        ];
    }

    /**
     * Sets the locations taking in acount the url params
     */
    protected function setLocationsFromUrl() {
        if(request()->has('locations')) {            
            $this->setLocationValueFromUrl('locations.pickup', 'pickup');

            $this->setLocationValueFromUrl('locations.return', 'dropoff');
        }
    }

     /**
     * Sets the values from the url
     * @param string $param The param name from the url
     * @param string $locationType The type of date to apply on ('pickup' or 'dropoff')    
     */
    protected function setLocationValueFromUrl($param, $locationType) {
        if (request()->has($param)) {
                
            $location = $this->locationRepository->like('name',  request()->input($param));

            if($location->count() > 0) {
                $this->locations[$locationType] = $location->first()->hashid;
            }
        }
    }    
}

?>