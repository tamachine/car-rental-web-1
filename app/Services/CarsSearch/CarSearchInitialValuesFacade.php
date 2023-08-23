<?php

namespace App\Services\CarsSearch;

use Illuminate\Support\Facades\Facade;

class CarSearchInitialValuesFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CarSearchInitialValues';
    }
}