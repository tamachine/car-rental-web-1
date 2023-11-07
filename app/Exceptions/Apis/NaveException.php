<?php

namespace App\Exceptions\Apis;

use Exception;
use Illuminate\Support\Facades\Log;
use Throwable;

class NaveException extends Exception
{
    protected $message;
    /**
     * Create a new api exception instance.
     *
     * @param $response
     * @return void
     */
    public function __construct( $message,$code,$endpoint)
    {
        $this->message = $message.'. Endpoint: '.$endpoint.'. Code: '.$code;
    
    }

    public function report(){
        Log::error('The API returned an error:'.$this->message);
    }

    public function render(){     
        abort(500);
    }
}
