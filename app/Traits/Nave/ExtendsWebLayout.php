<?php

namespace App\Traits\Nave;

use View; 

trait ExtendsWebLayout {
    
    public function shareSeoConfigurations() {
        View::share('seoConfigurations', $this->getSeoConfigurations());
    }
}