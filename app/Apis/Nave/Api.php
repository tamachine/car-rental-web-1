<?php

namespace App\Apis\Nave;

use App\Exceptions\ApiException;
use Exception;
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

            $this->response = Http::withToken($this->token)->{$method}($this->url . $endpoint, $params);
        } catch (Exception $e) {

            throw new ApiException($e->getMessage());
        }

        if ($this->response->successful()) {
            return $this->response->json();
        }

        throw new ApiException($this->response->body());
    }

}
