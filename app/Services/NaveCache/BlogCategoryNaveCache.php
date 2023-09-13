<?php

namespace App\Services\NaveCache;

use App\Interfaces\BlogCategoryRepositoryInterface;
use App\Interfaces\NaveCacheInterface;
use App\Interfaces\PageRepositoryInterface;

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
   
     /**
     * Calls the seoConfiguration method for all blog categories
     */
    protected function seoConfiguration() {        
        $this->log('calling seoConfiguration');

        $pageRepository = app(PageRepositoryInterface::class); 

        $pageRepository->setRefreshCache($this->refreshCache);

        foreach($pageRepository->all('blogcategory') as $page) {
            $this->log('calling seoConfiguration for '. $page->route_name);
            
            foreach($this->all as $category) {
                $this->blogCategoryRepository->seoConfiguration($category->slug, $page->route_name);
            }
        }        
    }
    
}