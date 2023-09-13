<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;
use App\Models\FaqCategory;

class Faq {

    use HasResponses {
        processSingleResponse as traitProcessSingleResponse;
    }

    public $hashid;
    public $question;
    public $answer;
    public $faqCategories = [];

    public function belongsToCategory($categoryHashId) {
        foreach($this->faqCategories as $faqCategory) {
            if($faqCategory->hashid == $categoryHashId) return true;
        }

        return false;
    }

    /**
     * overrides processSingleResponse from HasResponses
     */
    public static function processSingleResponse(array $instanceData): object {
        $faqObject = self::traitProcessSingleResponse($instanceData);     
            
        $faqObject->faqCategories = FaqCategory::processResponse($faqObject->faqCategories);

        return $faqObject;
    }
}