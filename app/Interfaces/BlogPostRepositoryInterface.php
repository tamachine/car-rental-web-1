<?php

namespace App\Interfaces;

interface BlogPostRepositoryInterface 
{
    public function all(): array;   
    
    public function latest(): array;  
}