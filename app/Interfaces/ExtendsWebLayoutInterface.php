<?php

namespace App\Interfaces;

use App\Models\SeoConfiguration;

/**
 * Interface used for the web layout. Better to use it along with ExtendsWebLayout trait
 */
interface ExtendsWebLayoutInterface 
{
    public function getSeoConfiguration(): SeoConfiguration;      
    public function footerImagePath(): string;    
    public function footerWebpImagePath(): string|null;
}