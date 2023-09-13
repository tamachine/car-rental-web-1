<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;

class Image {

    use HasResponses;
    
    public $url;
    public $webp_url;
    public $alt;
}