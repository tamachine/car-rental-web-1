<?php

namespace App\Interfaces;

use App\Models\Location;
use Illuminate\Support\Collection;

interface LocationRepositoryInterface 
{
    public function all($locale = null): array;   

    public function findByHashid($hashId, $locale = null): Location|null;

    public function like($attribute, $value, $locale = null): Collection|null;
}