<?php

namespace App\Interfaces;

use App\Models\BlogPost;
use App\Models\SeoConfiguration;
use Illuminate\Support\Collection;

interface BlogPostRepositoryInterface 
{
    public function all(string $search = null, string $tag_hashid = null): array;   

    public function findBySlug($slug): BlogPost|null;  
    
    public function latest($take = 3): Collection; 

    public function hero(): Collection; 

    public function top(): Collection; 
    
    public function seoConfiguration($blogPostSlug, $pageRouteName): SeoConfiguration;    
}