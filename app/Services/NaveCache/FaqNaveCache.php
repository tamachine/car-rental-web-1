<?php

namespace App\Services\NaveCache;

use App\Interfaces\FaqRepositoryInterface;
use App\Interfaces\NaveCacheInterface;

class FaqNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $faqRepositoryRepository;

    public function __construct(FaqRepositoryInterface $faqRepositoryRepository) {
        $this->faqRepositoryRepository = $faqRepositoryRepository;
    }
    
    public function run() {        
        $this->setAll();                               
    }

    public function getRepository()
    {
        return $this->faqRepositoryRepository;
    }    
}