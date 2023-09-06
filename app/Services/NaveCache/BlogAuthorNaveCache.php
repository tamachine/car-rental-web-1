<?php

namespace App\Services\NaveCache;

use App\Interfaces\BlogAuthorRepositoryInterface;
use App\Interfaces\NaveCacheInterface;
use App\Services\NaveCache\BaseNaveCache;

class BlogAuthorNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $blogAuthorRepository;

    protected $blogTagRepository;

    public function __construct(BlogAuthorRepositoryInterface $blogAuthorRepository) {
        $this->blogAuthorRepository = $blogAuthorRepository;
    }
    
    public function run() {        
        $this->setAll();
        $this->findBySlug();
        $this->seoConfiguration();
        $this->posts();        
    }

    public function getRepository()
    {
        return $this->blogAuthorRepository;
    }    

    
    
    

    
}