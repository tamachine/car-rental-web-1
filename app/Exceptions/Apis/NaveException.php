<?php

namespace App\Exceptions\Apis;

use Exception;
use Illuminate\Support\Facades\Log;

class NaveException extends Exception
{
    protected $message;
    protected $code;
    protected $endpoint;
    /**
     * Create a new api exception instance.
     *
     * @param $response
     * @return void
     */
    public function __construct( $message,$code,$endpoint)
    {
        $this->message = $message;
        $this->code = $code;
        $this->endpoint = $endpoint;
    }

    public function report(){
        Log::error('The API returned an error. Code:'.$this->code.'.Endpoint:'.$this->endpoint.'.Error:'.$this->message);
    }

    public function render(){
       
        return response()->view('errors.api-nave.500');
    }
}
