<?php

namespace App\Interfaces;

use App\Models\Booking;

interface BookingRepositoryInterface {
    
     /**
     * @var string car hasid
     * @var array $dates ['from' => 'Y-m-d H:i:s', 'to' => 'Y-m-d H:i:s']
     * @var array $locations ['pickup' => locationhashid, 'dropoff' => locationhashid]
     * @var array $insurances ['insurancehashid',...]
     * @var array $extras ['extrahashid' => quantity, 'extrahashid' => quantity]
     * @var array $details ["first_name"=>"tamara", "last_name" => "ríos", "email"=>"tamara.rios@scandinavianehf.com", "telephone" => "615345267", "address"=> "carrer sant ramon 14 2do", "postal_code"=>"08490", "city" => "tordera", "country"=>"spain", "number_passengers" : 2 ]
     * 
     * @var string $affiliateHashid hashid of the affiliate
     * @var string $currency 'ISK'
     */
    public function create(string $carHashid, array $dates, array $locations, array $insurances, array $extras, array $details, string $affiliateHashid = null, string $currency ='ISK'): Booking;
}