<?php

namespace App\Traits\Nave;

use App\Models\SeoConfiguration;

trait HasSeoConfigurations {

    public function processSeoConfigurations($data) {
        $seoConfiguration = new SeoConfiguration();

        foreach($data as $key => $value) {
            $seoConfiguration->$key = $value;
        }

        return $seoConfiguration;
    }

}