<?php

namespace App\Apis\Nave;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class Api
{
    protected $token;

    protected $url;

    protected $response;

    public function __construct() {
        $this->token = config('nave.token');
        $this->url   = config('nave.url');
    }

    public function get($endpoint, $params = []) {        
                               
        try {
            $this->response = Http::withToken($this->token)->get($this->url.$endpoint, $params);  

            if ($this->response->successful()) {
                return $this->response->json();
            }
            
            return [
                'error' => true,
                'message' => 'API returned an error.',
                'status' => $this->response->status(),
                'body' => $this->response->body()
            ];

        } catch (RequestException $e) {
            
            return [
                'error' => true,
                'message' => 'Failed to connect to the API.',
                'exception' => $e->getMessage()
            ];
        }       
    }
    
}