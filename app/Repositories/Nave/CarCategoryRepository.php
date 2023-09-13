<?php

namespace App\Repositories\Nave;

use App\Interfaces\CarCategoryRepositoryInterface;
use App\Repositories\Nave\BaseRepository;
use App\Models\CarType;

class CarCategoryRepository extends BaseRepository implements CarCategoryRepositoryInterface {
    
    public function all(): array {       
        $endpoint = 'carcategories';

        return $this->processArrayToObjects($this->processGet($endpoint), CarType::class);        
    }   
   
}
