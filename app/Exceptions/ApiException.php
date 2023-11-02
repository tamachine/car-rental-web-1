<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class ApiException extends Exception
{
 
    /**
     * Create a new api exception instance.
     *
     * @param $response
     * @return void
     */
    public function __construct( $response)
    {
        // sometimes the error is in the body of the message and it is too long 
        if(strlen($response)>400){
           $response = substr($response, 0, 400);
        }
        
        Log::channel('api')->error('The API returned an error: '.$response);
        
        abort(500);
    }

}
