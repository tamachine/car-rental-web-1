<?php

namespace App\Interfaces;

use App\Models\SeoConfiguration;

interface PageRepositoryInterface 
{
    public function all(string $class_name = null): array;  
    
    public function show($name);

    public function seoConfiguration($name): SeoConfiguration;
}