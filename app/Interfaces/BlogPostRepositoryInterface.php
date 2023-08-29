<?php

namespace App\Interfaces;

use App\Models\SeoConfiguration;
use Illuminate\Support\Collection;

interface BlogPostRepositoryInterface 
{
    public function all(): array;   
    
    public function latest($take = 3): Collection; 

    public function hero(): Collection; 

    public function top(): Collection; 
    
    public function seoConfiguration($blogPostSlug, $pageRouteName): SeoConfiguration;
}