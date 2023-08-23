<?php

namespace App\Services\CarsSearch;

use Carbon\Carbon;

/**
 * This class validates the values in the car search bar in order to check if they are correct for the search 
 */
class ValidateCarSearchDates {

    protected $dateFrom;

    protected $dateTo;

    protected $errors = [];

    public function __construct($dateFrom, $dateTo) {
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
        
        $this->handle();
    }

    public function check() {
        return (count($this->errors) == 0);
    }

    public function getErrors() {   
        return $this->errors;
    }

    protected function handle() {
        try{
            if($this->dateFrom) {
                if($this->dateTo) {
                    if($this->dateTo->gt($this->dateFrom)) {                   
                        if($this->dateFrom->copy()->startOfDay()->diffInDays(Carbon::today()->startOfDay()) < 1){
                            $this->errors['date-today'] = 'Date from is not greater than today'; 
                        } 
                    } else {
                        $this->errors['date-gt'] = 'Date from is not greater than date to'; 
                    }
                } else {
                    $this->errors['date-to'] = 'Date to not defined';    
                }
            } else {
                $this->errors['date-from'] = 'Date from not defined';
            }    
        } catch(\Exception $e) {
            $this->errors['date-e'] = $e->getMessage();
        }
            
    }
}