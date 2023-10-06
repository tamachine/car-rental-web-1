<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;

class CarPrices {

    use HasResponses;

    public $carPrice;
    public $extrasPrice;
    public $insurancesPrice;
    public $total;
    public $payNow;
    public $currency;
    public $extrasTotal;
    
}