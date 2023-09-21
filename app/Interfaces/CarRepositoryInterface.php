<?php

namespace App\Interfaces;

use App\Models\Car;
use App\Models\CarSearch;
use App\Models\SeoConfiguration;

interface CarRepositoryInterface 
{    
    public function all(): array;
    
    public function findByHashid($hashId, $locale = null): Car|null;
    
    public function search(array $types, array $specs, array $dates, array $locations): CarSearch;    
    
    public function seoConfiguration($carHashid, $pageRouteName): SeoConfiguration;  

    public function insurances($carHashId): array;
}