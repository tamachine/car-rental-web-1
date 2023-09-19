<?php

namespace App\Interfaces;

use App\Models\CarSearch;

interface CarRepositoryInterface 
{    
    public function search(array $types, array $specs, array $dates, array $locations): CarSearch;    
}