<?php

namespace App\Interfaces;

use App\Models\Booking;
use App\Models\Valitor;

interface ValitorRepositoryInterface {
    
    public function params(string $bookingHashid): Valitor;

    public function checkResponse(array $valitor_response, string $bookingHashid): bool;
}