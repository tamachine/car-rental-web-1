<?php

namespace App\Interfaces;

use App\Models\Valitor;

interface PaymentRepositoryInterface {
    
    public function valitor(string $bookingHashid): Valitor;
}