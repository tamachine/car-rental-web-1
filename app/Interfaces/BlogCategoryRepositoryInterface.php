<?php

namespace App\Interfaces;

interface BlogCategoryRepositoryInterface 
{
    public function all(bool $postsPublisehd = true): array;   

    public function posts(string $category_hash_id): array;  
        
}