<?php

namespace App\Traits\Nave;

use View; 

trait ExtendsWebLayout {
    
    public function shareSeoConfiguration() {
        View::share('seoConfiguration', $this->getSeoConfiguration());
    }
}