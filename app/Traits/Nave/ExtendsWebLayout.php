<?php

namespace App\Traits\Nave;

/**
 * 
 * This trait must be used along with ExtendsWebLayoutInterface
 */
trait ExtendsWebLayout {

    /** 
     * Returns the params needed for the web layout
     * @return array params
     */
    protected function webLayoutViewParams(): array {        
        return[
            'seoConfiguration'   => $this->getSeoConfiguration(),
            'footerImagePath'    => $this->footerImagePath(),   
            'footerWebpImagePath'=> $this->footerWebpImagePath(),           
        ];        
    }     
    
    /**
     * By default, the webp image for the footer is null. If there is one webp available, this method can be overrided
     */
    public function footerWebpImagePath(): string|null {
        return null;
    }
}