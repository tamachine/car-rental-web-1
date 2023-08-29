<?php

namespace App\Interfaces;

interface BlogTagRepositoryInterface 
{
    public function all(bool $postsPublished = true): array;   
        
}