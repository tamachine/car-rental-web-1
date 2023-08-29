<?php

namespace App\Repositories\Nave;

use App\Interfaces\FaqRepositoryInterface;
use App\Models\Faq;
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\HasSeoConfiguration;
use App\Helpers\ArrayHelper;
use App\Models\FaqCategory;

class FaqRepository extends BaseRepository implements FaqRepositoryInterface {
    
    use HasSeoConfiguration;

    public function all(): array {
        $endpoint = 'faqs';

        return $this->processFaqResponse($this->processGet($endpoint));
    }   

    protected function processFaqResponse($data): array {
        $response = [];

        foreach($data as $faq) {
            $faqObject = ArrayHelper::mapArrayToObject($faq, Faq::class);     
            
            $faqObject->faqCategories = $this->processArrayToObject($faqObject->faqCategories, FaqCategory::class);
            
            $response[] = $faqObject;
        }
        
        return $response;
    }
}
