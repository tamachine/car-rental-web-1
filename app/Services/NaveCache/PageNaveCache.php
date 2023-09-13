<?php

namespace App\Services\NaveCache;

use App\Interfaces\PageRepositoryInterface;
use App\Interfaces\NaveCacheInterface;

class PageNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository) {
        $this->pageRepository = $pageRepository;
    }
    
    public function run() {        
        $this->setAll();      
        $this->seoConfiguration();
        $this->show();                         
    }

    public function getRepository()
    {
        return $this->pageRepository;
    }    

    public function show() {
        $this->pageRepository->setRefreshCache($this->refreshCache);
        
        foreach($this->all as $page) {
            $this->pageRepository->show($page->route_name);
        }
    }

    /**
     * Calls the seoConfiguration method for all pages
     */
    protected function seoConfiguration() {        
        $this->log('calling seoConfiguration');

        $pageRepository = app(PageRepositoryInterface::class); 

        $pageRepository->setRefreshCache($this->refreshCache);

        foreach($pageRepository->all('empty') as $page) {
            $this->log('calling seoConfiguration for '. $page->route_name);
            
            $this->pageRepository->seoConfiguration($page->route_name);
        }        
    }
}