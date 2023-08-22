<?php

namespace App\Traits\Nave;

use App\Interfaces\CarCategoryRepositoryInterface;
use View; 
use App\Helpers\Cache as CacheHelper;
use Cache;

trait ExtendsWebLayout {

    protected function webLayoutViewParams() {        
        return[
            'seoConfiguration'  => $this->getSeoConfiguration(),
            'footerImagePath'   => $this->footerImagePath(),            
        ];        
    }        
}