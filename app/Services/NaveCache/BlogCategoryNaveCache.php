<?php

namespace App\Services\NaveCache;

use App\Interfaces\BlogCategoryRepositoryInterface;
use App\Interfaces\NaveCacheInterface;

class BlogCategoryNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $blogCategoryRepository;

    public function __construct(BlogCategoryRepositoryInterface $blogCategoryRepository) {
        $this->blogCategoryRepository = $blogCategoryRepository;
    }
    
    public function run() {
        
        $this->setAll();       
        $this->findBySlug();
        $this->seoConfiguration();
        $this->posts();        
    }

    public function getRepository()
    {
        return $this->blogCategoryRepository;
    }    

    
    
    

    
}