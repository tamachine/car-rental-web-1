<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;

class Translation {

    use HasResponses;

    public $full_key;
    public $text;
    public $group;
    public $key;

}