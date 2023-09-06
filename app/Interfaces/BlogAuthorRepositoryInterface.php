<?php

namespace App\Interfaces;

use App\Models\BlogAuthor;
use App\Models\SeoConfiguration;

interface BlogAuthorRepositoryInterface 
{
    public function all(): array;

    public function findBySlug($slug): BlogAuthor|null;  
        
    public function seoConfiguration($blogAuthorSlug, $pageRouteName): SeoConfiguration;    

    public function posts(string $author_hashid, string|null $search, string|null $tag_hashid): array;   
}