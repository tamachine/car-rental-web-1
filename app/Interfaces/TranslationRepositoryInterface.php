<?php

namespace App\Interfaces;

interface TranslationRepositoryInterface 
{
    public function all($group = null, $locale = null): array;      
}