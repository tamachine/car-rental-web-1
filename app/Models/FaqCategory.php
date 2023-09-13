<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;

class FaqCategory {

    use HasResponses;
    
    public $hashid;
    public $name;    
}