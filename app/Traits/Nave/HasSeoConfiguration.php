<?php

namespace App\Traits\Nave;

use App\Models\SeoConfiguration;

trait HasSeoConfiguration {

    public function processSeoConfiguration($data) {
        $seoConfiguration = new SeoConfiguration();

        foreach($data as $key => $value) {
            $seoConfiguration->$key = $value;
        }

        return $seoConfiguration;
    }

}