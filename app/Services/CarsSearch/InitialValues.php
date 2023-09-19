<?php

namespace App\Services\CarsSearch;

use App\Interfaces\LocationRepositoryInterface;

/**
 * 
 * This class manages the values that the car search bar must use taking in account the params from the url
 * 
 */
class InitialValues
{       
    
    protected $dates = []; //$dates

    protected $locations = []; //$locations[pickup' => Location hashid, 'dropoff' => hashid]

    protected $locationRepository;

    public function __construct() {       
        $this->locationRepository = app(LocationRepositoryInterface::class);     
        
        $this->setDates();
        $this->setLocations();
    }

    /** Return the Carbon dates that the bar must use
     * @return array ['from' => 'Carbon\Carbon date', 'to' => 'Carbon\Carbon date']  
     */
    public function getDates() {
        return $this->dates;
    }

    /** Return the formatted dates that the bar must use
     * @return array ['from' => 'd-m-y H:m', 'to' => 'd-m-Y H:m']  
     */
    public function getDatesFormatted() {
        $formattedDates['from'] = $this->dates['from']?->format('Y-m-d g:i A');
        $formattedDates['to']   = $this->dates['to']?->format('Y-m-d g:i A');

        return $formattedDates;
    }

    /** Return the locations that the bar must use
     * @return array [pickup' => Location hashid, 'dropoff' => hashid] 
     */
    public function getLocations() {
        return $this->locations;
    }

    /**
     * Returns a json string with the dates and locations that the car search bar must use in order to use them from the js code (car-search-bar.blade.php)
     */
    public function getJsonData() {
        return json_encode([
            'startDate' => $this->dates['from']?->format('Y-m-d'),
            'endDate'   => $this->dates['to']?->format('Y-m-d'),
            'startTime' => $this->dates['from']?->format('g:i A'),
            'endTime'   => $this->dates['to']?->format('g:i A'),
            'startLocation' => $this->locationRepository->findByHashid($this->locations['pickup'])?->name,
            'endLocation'   => $this->locationRepository->findByHashid($this->locations['dropoff'])?->name
        ]);
    }   
    
    /**
     * Sets the dates to use in the car search bar
     */
    protected function setDates() {
        $dateValues = new DateInitialValues();

        $this->dates = $dateValues->getDates();
    }

     /**
     * Sets the locations to use in the car search bar
     */
    protected function setLocations() {
        $locationValues = new LocationInitialValues();

       $this->locations = $locationValues->getLocations();
    }
}

?>