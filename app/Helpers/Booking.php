<?php

if (!function_exists('bookingDays')) {
    /**
     * The number of days a vehicle is booked
     *
     * @return     int
     */
    function bookingDays()
    {
        $sessionData = request()->session()->get('booking_data');
        return ceil($sessionData['from']->floatDiffInRealDays($sessionData['to']));
    }
}