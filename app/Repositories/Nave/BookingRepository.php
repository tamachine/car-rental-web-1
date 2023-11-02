<?php

namespace App\Repositories\Nave;

use App\Interfaces\BookingRepositoryInterface;
use App\Models\Booking;
use App\Models\BookingPayment;
use App\Repositories\Nave\BaseRepository;

class BookingRepository extends BaseRepository implements BookingRepositoryInterface {
    
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
    public function create(string $carHashid, array $dates, array $locations, array $insurances, array $extras, array $details, string $affiliate = null, string $currency ='ISK'): Booking {
        
        $endpoint = 'cars/' . $carHashid . '/booking/create';

        $params['dates']      = $dates;
        $params['locations']  = $locations;
        $params['insurances'] = $insurances;
        $params['extras']     = $extras;
        $params['details']    = $details;

        $params['affiliate']  = $affiliate;        
        $params['currency']   = $currency;
        
        return Booking::processSingleResponse($this->processPutData($endpoint, $params));
    }  
    
    public function update(string $bookingHashid, array $params = []) {
        $endpoint = "bookings/". $bookingHashid;
        
        if (isset($params['valitor_request']))  $params['valitor_request']  = $params['valitor_request'];
        if (isset($params['valitor_response'])) $params['valitor_response'] = $params['valitor_response'];

        return Booking::processSingleResponse($this->processPutData($endpoint,$params));
    }

    public function findbyHashid(string $bookingHashid): Booking {
        $endpoint = "bookings/" . $bookingHashid;

        return Booking::processSingleResponse($this->processGet($endpoint, [])); //we don't want to cache this one because the booking status can change fast
    }

    public function pdf(string $bookingHashid, bool $send = false): bool {        
        $endpoint = 'bookings/pdf/'.$bookingHashid;

        return $this->processPut($endpoint, ['send' => $send]);

    }
}