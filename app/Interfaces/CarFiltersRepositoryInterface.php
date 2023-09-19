<?php

namespace App\Interfaces;

interface CarFiltersRepositoryInterface 
{    
    public function all(): array;
    public function types(): array;
    public function transmissions(): array;
    public function roads(): array;
    public function seats(): array;
    public function engines(): array;
}