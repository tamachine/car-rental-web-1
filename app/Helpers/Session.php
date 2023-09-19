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
            'pickup_caren_id'   => $locationFrom->caren_settings ? $locationFrom->caren_settings["caren_pickup_location_id"] : null,
            'dropoff'           => $locationTo->hashid,
            'dropoff_name'      => $locationTo->name,
            'dropoff_caren_id'  => $locationTo->caren_settings ? $locationTo->caren_settings["caren_dropoff_location_id"] : null,
        ];       

        unset($data['car']);
        unset($data['insurances']);
        unset($data['extras']);

        request()->session()->put('booking_data', $data);        
    }
}