<?php

namespace App\Interfaces;

interface LocationRepositoryInterface 
{
    public function all($locale = null): array;      
}