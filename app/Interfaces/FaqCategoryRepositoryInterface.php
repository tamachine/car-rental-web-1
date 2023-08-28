<?php

namespace App\Interfaces;

interface FaqCategoryRepositoryInterface 
{
    public function all($all = false): array;      
}