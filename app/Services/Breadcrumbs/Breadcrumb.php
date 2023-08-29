<?php

namespace App\Services\Breadcrumbs;

/**
 * 
 * This class gets the web breadcrumbs
 */
class Breadcrumb
{          
    protected $link;  
    protected $route;
    protected $translation_full_key;    
    protected $text;    
    protected $id;

    public function setRoute($value) {
        $this->route = $value;
        $this->setLink(route($this->route));
    }

    public function getRoute() {
        return $this->route;
    } 

    public function setTranslationFullKey($value) {
        $this->translation_full_key = $value;
        $this->setText(__($this->translation_full_key));
    }    

    public function getTranslationFullKey() {
        return $this->translation_full_key;
    } 

    public function setLink($value) {
        $this->link = $value;
    }

    public function setText($value) {
        $this->text = $value;
    }

    public function getLink() {
        return $this->link;
    }

    public function getText() {
        return $this->text;
    }    
}

?>