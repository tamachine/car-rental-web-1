<?php

/**
 * Gathering place for any little helper functions focused on the app frontend.
 * This file is autoloaded by composer.json
 */

 if (!function_exists('selectedCurrency')) {
    /**
     * Returns the selected currency
     *
     * @return     string
     */
    function selectedCurrency()
    {
        return session('currency') !== null ? session('currency') : config('settings.default_currency');
    }
 }