<?php

namespace App\Helpers;

use Cache;
use App\Helpers\Cache as CacheHelper;
use App\Interfaces\ConfigRepositoryInterface;
use Illuminate\Support\Arr;

class Currency
{
    /**
     * Get the session name
     *
     * @return string
     */
    protected static function getSessionName()
    {
        return 'currency';
    }

    /**
     * Initialize the session
     */
    public static function initializeSession()
    {
        if(!request()->session()->has(self::getSessionName())){
            session([self::getSessionName() => config('settings.default_currency')]);
        }
    }

    /**
     * Get the avaiable currencies
     *
     * @return array
     */
    public static function availableCurrencies()
    {
        return Cache::store(CacheHelper::API_STORE)->rememberForever('currencies', function () {    
            $configRepository = app(ConfigRepositoryInterface::class);                 

            $currencies = Arr::pluck($configRepository->currencies(), 'id');

            return array_map('strtoupper', $currencies);
        });        
    }

    /**
     * Check if code is one of the available locale codes
     *
     * @return boolean
     */
    public static function isAvailableCode($code)
    {
        return in_array($code, self::availableCurrencies());
    }

    /**
     * Set the currency session
     *
     */
    public static function setSession($value)
    {
        session([self::getSessionName() => $value]);
    }

    /**
     * Set currency in session
     *
     */
    public static function setCurrencyInSession($code)
    {
        if(in_array($code, self::availableCurrencies())) {
            self::setSession($code);
        }
    }
}
