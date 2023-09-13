<?php

namespace App\Services\NaveCache;

use App\Interfaces\BlogAuthorRepositoryInterface;
use App\Interfaces\NaveCacheInterface;
use App\Interfaces\PageRepositoryInterface;
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
    
     /**
     * Calls the seoConfiguration method for all authors
     */
    protected function seoConfiguration() {        
        $this->log('calling seoConfiguration');

        $pageRepository = app(PageRepositoryInterface::class); 

        $pageRepository->setRefreshCache($this->refreshCache);

        foreach($pageRepository->all('blogauthor') as $page) {
            $this->log('calling seoConfiguration for '. $page->route_name);
            
            foreach($this->all as $author) {
                $this->blogAuthorRepository->seoConfiguration($author->slug, $page->route_name);
            }
        }        
    }
    

    
}