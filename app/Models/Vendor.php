<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;

class Vendor {

    use HasResponses;
    
    public $name; 
    public $service_fee; 
    public $vendor_code; 
    public $status; 
    public $brand_color; 
    public $logopublic;
    public $long_rental; 
    public $early_birdpublic;
    public $caren_settingspublic;

}