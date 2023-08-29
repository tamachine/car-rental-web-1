<?php

namespace App\Repositories\Nave;

use App\Interfaces\FaqCategoryRepositoryInterface;
use App\Repositories\Nave\BaseRepository;
use App\Models\FaqCategory;

class FaqCategoryRepository extends BaseRepository implements FaqCategoryRepositoryInterface {
    
    public function all($all = false): array {
        $endpoint = 'faqcategories';

        $params['all'] = $all;
        
        return $this->processArrayToObject($this->processGet($endpoint, $params), FaqCategory::class);
    }      
}
