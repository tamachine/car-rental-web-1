<?php

namespace App\Interfaces;

use App\Models\BlogTag;
use Illuminate\Support\Collection;

interface BlogTagRepositoryInterface 
{
    public function all(bool|null $postsPublished = true): array;   

    public function findByHashid($hashId, $locale = null): BlogTag|null;

    public function like($attribute, $value, $locale = null): Collection|null;
        
}