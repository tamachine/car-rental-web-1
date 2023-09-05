<?php

namespace App\Interfaces;

use App\Models\BlogAuthor;
use App\Models\SeoConfiguration;

interface BlogAuthorRepositoryInterface 
{
    public function findBySlug($slug): BlogAuthor|null;  
        
    public function seoConfiguration($blogPostSlug, $pageRouteName): SeoConfiguration;    

    public function posts(string $author_hashid, string $search, string $tag_hashid): array;   
}