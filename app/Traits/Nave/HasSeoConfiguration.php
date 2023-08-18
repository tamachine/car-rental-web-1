<?php

namespace App\Traits\Nave;

use App\Models\SeoConfiguration;
use App\Models\SeoSchema;

trait HasSeoConfiguration {

    public function processSeoConfiguration($data) {
        $seoConfiguration = $this->mapArrayToObject($data, new SeoConfiguration());

        $seoSchemas = [];

        foreach($data['seoSchemas'] as $schema ) {
            $seoSchema = $this->mapArrayToObject($schema, new SeoSchema());

            $seoSchemas[] = $seoSchema;
        }

        $seoConfiguration->seoSchemas = $seoSchemas;

        return $seoConfiguration;
    }

    protected function mapArrayToObject(array $array, object $object) {        
        foreach($array as $key => $value) {
            $object->$key = $value;                    
        }

        return $object;
    }

}