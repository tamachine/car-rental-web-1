<?php

namespace App\Traits\Livewire;

use App\Apis\Caren\Api;
use App\Interfaces\CarRepositoryInterface;

trait SummaryTrait
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $car;

     /**
     * @var string
     */
    public $carHashid;

     /**
     * @var string
     */
    public $carName;

    /**
     * @var string
     */
    public $mainImage;

    /**
     * @var string
     */
    public $pickupLocation;

    /**
     * @var string
     */
    public $dropoffLocation;

    /**
     * @var array
     */
    public $insurances = [];

    /**
     * @var array
     */
    public $chosenExtras = [];

    /**
     * @var array
     */
    public $includedExtras = [];

    /**
     * @var array
     */
    public $unitsExtras = [];

    /**
     * @var float
     */
    public $rentalPrice = 0;

    /**
     * @var float
     */
    public $extrasPrice = 0;

    /**
     * @var float
     */
    public $totalPrice = 0;

    /**
     * @var float
     */
    public $iskPrice = 0;

    /**
     * @var float
     */
    public $percentage = 0;

    /**
     * @var float
     */
    public $payNow = 0;

    /**
     * @var bool
     */
    public $generateValitorForm = false;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

     /**
     * Returns the Car instance retrieving it from the public string property
     * @return BlogAuthor 
     */
    protected function getCarObject(): object { 
        return json_decode($this->car);
    }

    protected function calculateTotal()
    {
        $sessionData = request()->session()->get('booking_data');
        $extras = [];

        if (isset($sessionData['extras'])) {
            foreach ($sessionData['extras'] as $chosenExtra) {
                $extras[$chosenExtra['hashid']] = $chosenExtra['quantity'];
            }
        }

        $api = app(CarRepositoryInterface::class);

        $carenPrices = 
            $api->prices(
                $this->carHashid, 
                [
                    'from' => $sessionData["from"]->format('Y-m-d H:i:s'), 
                    'to'   => $sessionData["to"]->format('Y-m-d H:i:s')
                ],
                [
                    'pickup'  => $sessionData["pickup_hashid"], 
                    'dropoff' => $sessionData["dropoff_hashid"]
                ],                
                count($sessionData["insurances"])
                ? array_column($sessionData["insurances"], 'hashid')
                : [],
                $extras,
            );

        $this->rentalPrice = $carenPrices->carPrice;
        $this->extrasPrice = $carenPrices->extrasTotal;
        $this->totalPrice  = $this->iskPrice = $carenPrices->total;
        $this->payNow      = $carenPrices->payNow;
        
    }
}
