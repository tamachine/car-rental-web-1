<?php

namespace App\Apis\Nave;

use App\Exceptions\Apis\NaveException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class Api
{
    protected $token;

    protected $url;

    protected $response;

    public function __construct() {
        $this->token = config('nave.token');
        $this->url   = config('nave.url');
    }

    public function sendHttpRequest($method, $endpoint, $params = [])
    {
        try {
           
            $this->response = (Http::withToken($this->token)->{$method}($this->url . $endpoint, $params));
           
            if ($this->response->successful()) {
                return $this->response->json();
            }
           
            throw new NaveException($this->response->json()['message'], 
                                    $this->response->json()['code'],
                                    $endpoint,
                                    $params);
        
        }catch (ConnectionException $e) {
          
            throw new NaveException($e->getMessage(), $e->getCode(), $endpoint, $params);
        }
     
    }

}
