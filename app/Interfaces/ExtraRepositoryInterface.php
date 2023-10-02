<?php

namespace App\Interfaces;

use App\Models\CarExtra;

interface ExtraRepositoryInterface 
{
    public function all(): array; 

    public function findByHashid($hashId, $locale = null): CarExtra|null; 
   
}