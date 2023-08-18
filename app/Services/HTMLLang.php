<?php

namespace App\Services;

use App\Models\SeoConfiguration;

class HTMLLang {

    protected $seoConfigurations;
    protected $HTMLLang;

    public function __construct(SeoConfiguration $seoConfigurations) {
        $this->seoConfigurations = $seoConfigurations;
        $this->setHTMLLang();    
    }

    /**
     * Returns the corresponding lang attribute for the HTML tag
     */
    public function getHTMLLang():string {
        return $this->HTMLLang;
    }

    /**
     * Sets the HTML lang based on seo configurations
     */
    protected function setHTMLLang() {
        $this->HTMLLang = $this->getDefaultLang();

        if($this->seoConfigurations !== null) {
            if(!empty($this->seoConfigurations->lang)) {
                $this->HTMLLang = $this->seoConfigurations->lang;
            }            
        }
    }

    /**
     * Returns the default lang for the HTML tag
     * 
     * @return string
     */
    protected function getDefaultLang() {
        return str_replace('_', '-', app()->getLocale());
    }
}