<?php

namespace App\Services\NaveCache;

use App\Interfaces\FaqCategoryRepositoryInterface;
use App\Interfaces\NaveCacheInterface;

class FaqCategoryNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $faqCategoryRepository;

    public function __construct(FaqCategoryRepositoryInterface $faqCategoryRepository) {
        $this->faqCategoryRepository = $faqCategoryRepository;
    }
    
    public function run() {        
        $this->setAll();                               
    }

    public function getRepository()
    {
        return $this->faqCategoryRepository;
    }    
}