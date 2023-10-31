<?php

namespace App\Models;

use Exception;
use App\Models\SeoSchema;
use App\Traits\Nave\HasResponses;

class SeoConfiguration {

    use HasResponses {
        processSingleResponse as traitProcessSingleResponse;
    }

    public $meta_title;
    public $meta_description;
    public $noindex;
    public $nofollow;
    public $lang;
    public $canonical;
    public $seoSchemas = [];

    /**
     * overrides processSingleResponse from HasResponses trait
     */
    public static function processSingleResponse(array|null $instanceData): object
    {
        $seoConfiguration = self::traitProcessSingleResponse($instanceData);
        
        if (isset($instanceData['seoSchemas'])) $seoConfiguration->seoSchemas = SeoSchema::processResponse($instanceData['seoSchemas']);
        
        return $seoConfiguration;           
    }
}
