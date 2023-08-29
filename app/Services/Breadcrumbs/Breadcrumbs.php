<?php

namespace App\Services\Breadcrumbs;

use App\Services\Breadcrumbs\Breadcrumb;

/**
 * 
 * This class gets the web breadcrumbs
 */
class Breadcrumbs
{       
   /**
     * @var Array of App\Services\Breadcrumbs\Breadcrumb
     */
    protected $breadcrumbs;
    
    public function __construct() {
        $this->create();
    }

    public function getBreadcrumbByRoute($routeName) {
        foreach($this->breadcrumbs as $breadcrumb) {
            if($breadcrumb->getRoute() == $routeName) {
                return $breadcrumb;
            }
        }        
    }

    public function getBreadcrumbByTranslationFullKey($fullKey) {
        foreach($this->breadcrumbs as $breadcrumb) {
            if($breadcrumb->getTranslationFullKey() == $fullKey) {
                return $breadcrumb;
            }
        }
    }

    protected function create() {
        $breadcrumb = new Breadcrumb();        
        $breadcrumb->setRoute('home');
        $breadcrumb->setTranslationFullKey('breadcrumbs.home');

        $this->addBreadcrumb($breadcrumb);

        $breadcrumb = new Breadcrumb();
        $breadcrumb->setRoute('cars');
        $breadcrumb->setTranslationFullKey('navbar.cars');
        
        $this->addBreadcrumb($breadcrumb);

        $breadcrumb = new Breadcrumb();
        $breadcrumb->setRoute('blog');
        $breadcrumb->setTranslationFullKey('breadcrumbs.blog');        
        
        $this->addBreadcrumb($breadcrumb);
    }

    protected function addBreadcrumb(Breadcrumb $breadcrumb) {
        $this->breadcrumbs[] = $breadcrumb;
    }
}

?>