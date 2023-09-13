<?php

namespace App\Models;

use App\Helpers\ArrayHelper;
use App\Traits\Nave\HasResponses;

class BlogTag {

    use HasResponses {
        processSingleResponse as public traitProcessSingleResponse;
    }

    public $hashid;
    public $name;
    public $slug;    
    public $color;

    public function toJson() {
        return json_encode($this);
    }    
    
     /**
     * override method from HasResponses trait
     */
    public static function processSingleResponse(array $instanceData): object {
        $blogTagObject = self::traitProcessSingleResponse($instanceData);

        $blogTagObject->color = ArrayHelper::mapArrayToObject($instanceData['color'], BlogTagColor::class); 
        
        return $blogTagObject;       
    }

}