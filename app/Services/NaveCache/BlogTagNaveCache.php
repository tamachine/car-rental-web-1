<?php

namespace App\Services\NaveCache;

use App\Interfaces\BlogTagRepositoryInterface;
use App\Interfaces\NaveCacheInterface;

class BlogTagNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $blogTagRepository;

    public function __construct(BlogTagRepositoryInterface $blogTagRepository) {
        $this->blogTagRepository = $blogTagRepository;
    }
    
    public function run() {        
        $this->setAll();            
        $this->findBySlug();                 
    }

    public function getRepository()
    {
        return $this->blogTagRepository;
    }    
}