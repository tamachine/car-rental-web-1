<?php

/**
 * Gathering place for any little helper functions focused on the session app frontend.
 * This file is autoloaded by composer.json
 */

use App\Interfaces\LocationRepositoryInterface;

 if (!function_exists('checkSessionCar')) {
    /**
     * Check if we have an active search session in the car list.
     * If so, delete the car, insurances & extras info
     * If not, we create one
     *
     * @return void
     */
    function checkSessionCar()
    {     
        $locationRepository = app(LocationRepositoryInterface::class);       

        $dates = CarSearchInitialValues::getDates();
        
        $locations = CarSearchInitialValues::getLocations();

        $locationFrom = $locationRepository->findByHashid($locations['pickup']);
        $locationTo   = $locationRepository->findByHashid($locations['dropoff']);        

        $data = [
            'from'              => $dates['from'],
            'to'                => $dates['to'],
            'pickup'            => $locationFrom->hashid,
            'pickup_name'       => $locationFrom->name,
            'pickup_hashid'     => $locationFrom->hashid,
            'pickup_caren_id'   => $locationFrom->caren_settings ? $locationFrom->caren_settings["caren_pickup_location_id"] : null,
            'dropoff'           => $locationTo->hashid,
            'dropoff_name'      => $locationTo->name,
            'dropoff_hashid'    => $locationTo->hashid,
            'dropoff_caren_id'  => $locationTo->caren_settings ? $locationTo->caren_settings["caren_dropoff_location_id"] : null,
        ];       

        unset($data['car']);
        unset($data['insurances']);
        unset($data['extras']);

        request()->session()->put('booking_data', $data);        
    }
}

if (!function_exists('checkSessionInsurances')) {
    /**
     * Inruances screen: We must have dates, locations and a car selected
     *
     * @return bool
     */
    function checkSessionInsurances()
    {
        if(!request()->session()->has('booking_data')) {
            return false;
        }

        $data = request()->session()->get('booking_data');

        if (!isset($data['from'])
            || !isset($data['to'])
            || !isset($data['pickup'])
            || !isset($data['dropoff'])
            || !isset($data['car'])
        ) {
            return false;
        }

        unset($data['insurances']);
        unset($data['extras']);

        request()->session()->put('booking_data', $data);

        return true;
    }
}


if (!function_exists('checkSessionExtras')) {
    /**
     * Extras screen: We must have dates, locations, a car and an insurance selected
     *
     * @return bool
     */
    function checkSessionExtras()
    {
        if(!request()->session()->has('booking_data')) {
            return false;
        }

        $data = request()->session()->get('booking_data');

        if (!isset($data['from'])
            || !isset($data['to'])
            || !isset($data['pickup'])
            || !isset($data['dropoff'])
            || !isset($data['car'])
            || !isset($data['insurances'])
        ) {
            return false;
        }
        
        request()->session()->put('booking_data', $data);

        return true;
    }
}


if (!function_exists('bookingPickupLocation')) {
    /**
     * It returns the booking pickup location
     *
     * @return     string
     */
    function bookingPickupLocation()
    {
        $sessionData = request()->session()->get('booking_data');
        return $sessionData['pickup_name'];
    }
}


if (!function_exists('bookingDropoffLocation')) {
    /**
     * It returns the booking dropoff location
     *
     * @return     string
     */
    function bookingDropoffLocation()
    {
        $sessionData = request()->session()->get('booking_data');
        return $sessionData['dropoff_name'];
    }
}

if (!function_exists('bookingInsurances')) {
    /**
     * It returns the booking insurances
     *
     * @return     array
     */
    function bookingInsurances()
    {
        $sessionData = request()->session()->get('booking_data');
        return $sessionData['insurances'];
    }
}

if (!function_exists('bookingPickupDate')) {
    /**
     * It returns the booking pickup as "Month day, Year"
     *
     * @return     string
     */
    function bookingPickupDate()
    {
        $sessionData = request()->session()->get('booking_data');
        return $sessionData['from']->isoFormat("MMMM D, Y");
    }
}

if (!function_exists('bookingDropoffDate')) {
    /**
     * It returns the booking dropoff as "Month day, Year"
     *
     * @return     string
     */
    function bookingDropoffDate()
    {
        $sessionData = request()->session()->get('booking_data');
        return $sessionData['to']->isoFormat("MMMM D, Y");
    }
}


if (!function_exists('checkSessionPayment')) {
    /**
     * Extras screen: We must have dates, locations, car, insurances and extras selected
     *
     * @return bool
     */
    function checkSessionPayment()
    {
        if(!request()->session()->has('booking_data')) {
            return false;
        }

        $data = request()->session()->get('booking_data');

        if (!isset($data['from'])
            || !isset($data['to'])
            || !isset($data['pickup'])
            || !isset($data['dropoff'])
            || !isset($data['car'])
            || !isset($data['insurances'])
            || !isset($data['extras'])
        ) {
            return false;
        }

        return true;
    }
}