<?php

namespace App\Interfaces;

use App\Models\SeoConfiguration;

interface ExtendsWebLayoutInterface 
{
    public function getSeoConfigurations(): SeoConfiguration;      
}