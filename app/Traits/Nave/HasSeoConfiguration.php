<?php

namespace App\Traits\Nave;

use App\Models\SeoConfiguration;
use App\Models\SeoSchema;
use App\Helpers\ArrayHelper;

trait HasSeoConfiguration {

    public function processSeoConfiguration($data) {
        $seoConfiguration = ArrayHelper::mapArrayToObject($data, SeoConfiguration::class);

        $seoSchemas = [];

        foreach($data['seoSchemas'] as $schema ) {
            $seoSchema = ArrayHelper::mapArrayToObject($schema, SeoSchema::class);

            $seoSchemas[] = $seoSchema;
        }

        $seoConfiguration->seoSchemas = $seoSchemas;

        return $seoConfiguration;
    }
}