<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;

class Valitor {
    
    use HasResponses {
        processSingleResponse as traitProcessSingleResponse;
    }

    public $params;
    public string $form_action;

     /**
     * overrides processSingleResponse from Hasresponses trait
     */
    public static function processSingleResponse(array|null $instanceData): object {
        $valitorObject = self::traitProcessSingleResponse($instanceData);     
            
        $valitorObject->params = ValitorParams::processSingleResponse($instanceData['params']);
            
        return $valitorObject;
    }
}