<?php

namespace App\Interfaces;

use App\Models\CarenLocation;

interface CarenLocationRepositoryInterface 
{
    public function all(): array;   

    public function firstNotNull($attribute): CarenLocation|null;    
}