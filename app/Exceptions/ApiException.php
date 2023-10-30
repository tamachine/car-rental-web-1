<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Client\Response;

class ApiException extends Exception
{
    /**
     * Create a new api exception instance.
     *
     * @param  $response
     * @return void
     */
    public function __construct($response)
    {
        if ($response instanceof Response) {
            $message = $this->processApiError($response);
        } else {
            $message = $this->processHttpRequestError($response);
        }
        parent::__construct($message);
    }

    /**
     * Prepare the api exception message.
     *
     * @param  \Illuminate\Http\Client\Response  $response
     * @return string
     */
    private function processApiError(Response $response): string
    {
        $message = json_decode($response->body())->message ?? $response->body();

        return "API returned an error: {$message}, code: {$response->status()}";
    }

    /**
     * Prepare the api conection message.
     *
     * @param  $response
     * @return string
     */
    private function processHttpRequestError($response): string
    {
        if (is_object($response) && method_exists($response, 'getMessage')) {
            return "Failed to connect to the API: {$response->getMessage()}";
        }
        return "Failed to connect to the API.";
    }
}
