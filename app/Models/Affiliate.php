<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;

class Affiliate {

    use HasResponses;

    public $hashid;
    public $commission_percentage;
}