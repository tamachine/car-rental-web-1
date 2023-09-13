<?php

namespace App\Services\NaveCache;

use App\Interfaces\BlogPostRepositoryInterface;
use App\Interfaces\BlogTagRepositoryInterface;
use App\Interfaces\NaveCacheInterface;
use App\Interfaces\PageRepositoryInterface;

class BlogPostNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $blogPostRepository;

    public function __construct(BlogPostRepositoryInterface $blogPostRepository) {
        $this->blogPostRepository = $blogPostRepository;
    }
    
    public function run() {
        
        $this->setAll();            
        $this->findBySlug();
        $this->seoConfiguration();        
        $this->postsWithParams();   
    }

    public function getRepository()
    {
        return $this->blogPostRepository;
    }    
    
    /**
     * Set all the element comming from the repository
     */
    protected function postsWithParams() {
        $this->log('calling all');
        
        $blogTagRepository = app(BlogTagRepositoryInterface::class);  

        $blogTagRepository->setRefreshCache($this->refreshCache);

        $this->blogPostRepository->setRefreshCache($this->refreshCache);

        $this->log('calling postsWithParams for tags');

        foreach($blogTagRepository->all() as $blogTag) {
            $this->blogPostRepository->all(null, $blogTag->hashid);
        }        
    }
    
    /**
     * Calls the seoConfiguration method for all blog post
     */
    protected function seoConfiguration() {        
        $this->log('calling seoConfiguration');

        $pageRepository = app(PageRepositoryInterface::class); 

        $pageRepository->setRefreshCache($this->refreshCache);

        foreach($pageRepository->all('blogpost') as $page) {
            $this->log('calling seoConfiguration for '. $page->route_name);
            
            foreach($this->all as $post) {
                $this->blogPostRepository->seoConfiguration($post->slug, $page->route_name);
            }
        }        
    }
    
}