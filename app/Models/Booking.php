<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;

class Booking {

    use HasResponses;

    public $hashid;
    public $status;
    public $name;
    public $email;
    public $telephone;
    public $address;
    public $city;
    public $postal_code;
    public $country;
}