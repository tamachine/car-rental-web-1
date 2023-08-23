<?php

namespace App\Repositories\Nave;

use Nave;
use App;

class BaseRepository {
   
    protected function processGet($endpoint, $params = []) {

        $params['locale'] ??= App::getLocale();

        $response = Nave::get($endpoint, $params);

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
