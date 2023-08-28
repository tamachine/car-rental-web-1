<?php

namespace App\Models;

class Faq {
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
}