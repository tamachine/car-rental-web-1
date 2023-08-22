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

        $response = Nave::get($endpoint);

        return $this->processCarTypeResponse($this->processResponse($response));        
    }

    protected function processCarTypeResponse($data) {
        $response = [];

        foreach($data as $carType) {
            $response[] = ArrayHelper::mapArrayToObject($carType, new CarType());
        }
        
        return $response;
    }
   
}
