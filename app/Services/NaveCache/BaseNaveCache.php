<?php

namespace App\Services\NaveCache;

use App\Helpers\Cache;
use App\Helpers\RouteHelper;
use App\Interfaces\BlogTagRepositoryInterface;
use Illuminate\Support\Facades\Log;

abstract class BaseNaveCache {

    protected $all;    

    abstract public function getRepository();
    
    protected function setAll() {
        $this->log('calling all');
        
        $this->all = $this->getRepository()->all();
    }

    protected function findBySlug() {
        $this->log('calling findBySlug');

        foreach($this->all as $blogAuthor) {
            $this->getRepository()->findBySlug($blogAuthor->slug);
        }
    }

    protected function seoConfiguration() {        
        $this->log('calling seoConfiguration');

        foreach(RouteHelper::getAllRouteNames() as $routeName) {
            foreach($this->all as $blogAuthor) {
                $this->getRepository()->seoConfiguration($blogAuthor->slug, $routeName);
            }
        }        
    }

    protected function posts() {
        $this->log('calling posts');
        
        $blogTagRepository = app(BlogTagRepositoryInterface::class);            
            
        foreach($this->all as $instance) {
            foreach($blogTagRepository->all() as $blogTag) {
                $this->getRepository()->posts($instance->hashid, null, $blogTag->hashid);
            }            
        }
    }

    protected function log($message) {
        Log::channel(Cache::LOG_CHANNEL)->info($message . ' for ' . $this->getRepository()::class);
    }
}