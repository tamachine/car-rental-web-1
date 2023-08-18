<?php

namespace App\Interfaces;

use App\Models\SeoConfiguration;

interface PageRepositoryInterface 
{
    public function all(): array;  
    
    public function show($name);

    public function seoConfigurations($name): SeoConfiguration;
}