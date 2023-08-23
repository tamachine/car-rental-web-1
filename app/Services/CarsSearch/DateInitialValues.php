<?php

namespace App\Services\CarsSearch;

use Carbon\Carbon;

/**
 * This class manages the dates that the car search bar must use taking in account the params from the url 
 */
class DateInitialValues
{       
    const DATE_FORMAT = 'Y-m-d';
    const TIME_FORMAT = 'g:i A';
    CONST TIME_REGEX  = '/^([1-9]|1[0-2]):[0-5][0-9] (AM|PM)$/i';
    
    protected $dates = []; //$dates['from' => 'd-m-y H:m', 'to' => 'd-m-Y H:m']       
    
    public function __construct() {

        $this->setDefaultDates();

        $this->setDatesFromUrl();

        $this->setTimesFromUrl();    

        $this->check();

    }

    /** Returns the dates to use
     * 
     * @return array ['from' => 'd-m-y H:m', 'to' => 'd-m-Y H:m'] 
     */
    public function getDates() {
        return $this->dates;        
    }  
    
    /**
     * Validates if the dates are correct.
     * @return boolean
     */
    public function validate() {
        $validation = new ValidateCarSearchDates($this->dates['from'], $this->dates['to']);

        return $validation->check();
    }

    /**
     * Checks if the dates are correct. If they are not, it sets the dates to null
     */
    protected function check() {        
        if(!$this->validate()) {
            $this->dates['from'] = null;
            $this->dates['to'] = null;
        }
    }    

    /**
     * Sets the default dates
     */
    protected function setDefaultDates() {
        $this->dates = [
            'from' => null, 
            'to'   => null  
        ];
    }

    /**
     * Sets the dates (without time) taking in acount the url params
     */
    protected function setDatesFromUrl() {
        if(request()->has('dates')) {            

            $this->setValueFromUrl('dates.start', 'from', self::DATE_FORMAT, 'date');

            $this->setValueFromUrl('dates.end', 'to', self::DATE_FORMAT, 'date');
        }
    }

     /**
     * Sets the times (without date) taking in acount the url params
     */
    protected function setTimesFromUrl() {
        if(request()->has('hours')) {            

            $this->setValueFromUrl('hours.start', 'from', self::TIME_FORMAT, 'time');

            $this->setValueFromUrl('hours.end', 'to', self::TIME_FORMAT, 'time');
        }
    }   

     /**
     * Sets the values from the url
     * @param string $param The param name from the url
     * @param string $dataType The type of date to apply on ('from' or 'to')
     * @param string $format The format to check
     * @param string $type ('date' or 'time') If its a date or a time
     */
    protected function setValueFromUrl($param, $dateType, $format, $type = 'date') {

        if (request()->has($param)) {
                
            if ($this->validateFormat($type, request()->input($param))) {

                $carbon = Carbon::createFromFormat($format, request()->input($param));

                if($carbon) {

                    if($type == 'date') {                       

                        $this->dates[$dateType] = $carbon->setTimeFromTimeString('12:00 AM');   
                              
                    } else { //time

                        if($this->dates[$dateType]) {

                            $this->dates[$dateType]->setTime($carbon->hour, $carbon->minute, $carbon->second);
                        }                        
                    }                    
                }
            }               
        }
    }

    /**
     * Validate de date or time format from the url
     * @return boolean
     */
    protected function validateFormat($type, $value) {
        if($type == 'time') {
            return (preg_match(self::TIME_REGEX, $value));
        } else { //date
            return Carbon::hasFormat($value, self::DATE_FORMAT);
        }
    }
}

?>