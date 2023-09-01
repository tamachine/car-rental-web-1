<?php

namespace App\Repositories\Nave;

use App\Interfaces\CarCategoryRepositoryInterface;
use App\Repositories\Nave\BaseRepository;
use App\Models\CarType;
use App\Traits\Nave\HasObjectResponses;

class CarCategoryRepository extends BaseRepository implements CarCategoryRepositoryInterface {
    
    use HasObjectResponses;

    public function all(): array {       
        $endpoint = 'carcategories';

        return $this->processArrayToObjects($this->processGet($endpoint), CarType::class);        
    }   
   
}
