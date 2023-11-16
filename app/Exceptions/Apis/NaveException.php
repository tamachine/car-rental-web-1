<?php

namespace App\Exceptions\Apis;

use Exception;
use Illuminate\Support\Facades\Log;

class NaveException extends Exception
{
    protected $message;
    protected $code;
    protected $endpoint;
    protected $params;

    /**
     * Create a new api exception instance.
     *
     * @param $response
     * @return void
     */
    public function __construct( $message, $code, $endpoint, $params = [])
    {
        $this->message = $message;
        $this->code = $code;
        $this->endpoint = $endpoint;
        $this->params = $params;
    }

    public function report(){
        Log::critical('There was a ' . $this->code . '  error calling: ' . $this->endpoint . ' with params: ' . implode(' / ', $this->params) . ': ' . $this->message);
    }

    public function render(){
        abort(500);
    }
}
