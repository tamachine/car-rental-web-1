<?php

namespace App\Repositories\Nave;

use App\Interfaces\CarCategoryRepositoryInterface;
use App\Repositories\Nave\BaseRepository;
use Nave; 
use App\Helpers\ArrayHelper;
use App\Models\CarType;

class CarCategoryRepository extends BaseRepository implements CarCategoryRepositoryInterface {
    
    public function all(): array {       
        $endpoint = 'carcategories';

        return $this->processArrayToObject($this->processGet($endpoint), CarType::class);        
    }   
   
}
