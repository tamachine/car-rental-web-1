<?php

namespace App\Repositories\Nave;

use Nave;

class BaseRepository {
   
    protected function processGet($endpoint) {
        $response = Nave::get($endpoint);

        return $this->processResponse($response);     
    }    

    protected function processResponse($response) {
        if(isset($response['success'])) {
            if($response['success']) {
                return $response['data'];
            }
        }

        return [];   
    }
}
