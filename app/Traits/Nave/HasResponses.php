<?php

namespace App\Traits\Nave;

use App\Helpers\ArrayHelper;

/**
 * This trait transforms the data response from nave to its corresponding model
 */
trait HasResponses {

    /**
     * process all the data
     * @var array $data the response data from the nave api
     */
    public static function processResponse(array|null $data): array {
        $response = [];

        foreach($data as $instanceData) {
            $response[] = self::processSingleResponse($instanceData);
        }
        
        return $response;
    }   
    
    /**
     * process the 'instance' response from the nave api
     * @var array $instanceData the array item that the api nave sends
     * @return object an object instance of the current model
     */
    public static function processSingleResponse(array $instanceData): object {
        return ArrayHelper::mapArrayToObject($instanceData, self::class);         
    }

}