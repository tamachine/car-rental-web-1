<?php

namespace App\Interfaces;

interface CurrencyRatesRepositoryInterface 
{
    public function all(): array;               
}