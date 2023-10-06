<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;
use Illuminate\Database\Eloquent\Model;

class ContactFormType extends Model
{
    use HasResponses;

    public $hashid;
    public $name; 

}
