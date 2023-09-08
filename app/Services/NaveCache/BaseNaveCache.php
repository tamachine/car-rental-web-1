<?php

namespace App\Services\NaveCache;

use App\Helpers\Cache;
use App\Helpers\RouteHelper;
use App\Interfaces\BlogTagRepositoryInterface;
use App\Interfaces\PageRepositoryInterface;
use Illuminate\Support\Facades\Log;

/**
 * this class has a serie of common methods that the repositories call
 */
abstract class BaseNaveCache {

    protected $all;    

    abstract public function getRepository();  //it has to return the repository class to be used 
    
    /**
     * Set all the element comming from the repository
     */
    protected function setAll() {
        $this->log('calling all');
        
        $this->all = $this->getRepository()->all();
    }

    /**
     * Calls the findBySlug method for all the elements of the repository
     */
    protected function findBySlug() {
        $this->log('calling findBySlug');

        foreach($this->all as $blogAuthor) {
            $this->getRepository()->findBySlug($blogAuthor->slug);
        }
    }

    /**
     * Calls the seoConfiguration method for all the elements of the repository and all the application routes
     */
    protected function seoConfiguration() {        
        $this->log('calling seoConfiguration');

        $pageRepository = app(PageRepositoryInterface::class); 

        foreach($pageRepository->all() as $page) {
            $this->log('calling seoConfiguration for '. $page->route_name);
            foreach($this->all as $blogAuthor) {
                $this->getRepository()->seoConfiguration($blogAuthor->slug, $page->route_name);
            }
        }        
    }

     /**
     * Calls the posts method for all the elements of the repository and the blog tags
     */
    protected function posts() {
        $this->log('calling posts');
        
        $blogTagRepository = app(BlogTagRepositoryInterface::class);            
            
        foreach($this->all as $instance) {
            foreach($blogTagRepository->all() as $blogTag) {
                $this->getRepository()->posts($instance->hashid, null, $blogTag->hashid);
            }            
        }
    }

    /**
     * Log information in the Cache::LOG_CHANNEL channel
     */
    protected function log($message) {
        Log::channel(Cache::LOG_CHANNEL)->info($message . ' for ' . $this->getRepository()::class);
    }
}