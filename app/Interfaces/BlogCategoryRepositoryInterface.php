<?php

namespace App\Interfaces;

use App\Models\BlogCategory;
use App\Models\SeoConfiguration;

interface BlogCategoryRepositoryInterface 
{
    public function all(bool $postsPublisehd = true): array;   

    public function findBySlug($slug): BlogCategory|null;  
        
    public function seoConfiguration($blogCategorySlug, $pageRouteName): SeoConfiguration;   

    public function posts(string $category_hashid, string|null $search = null, string|null $tag_hash_id = null): array;      
        
}