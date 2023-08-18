<?php
namespace App\Apis\Nave;

use Illuminate\Support\Facades\Facade;

class ApiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Nave';
    }
}