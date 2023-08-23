<?php

namespace App\Repositories\Nave;

use Nave;
use App;
use Cache;
use App\Helpers\Cache as CacheHelper;

class BaseRepository {

    const CACHED = 1;
   
    /**
     * returns the Nave::get response
     * @param string $endpoint
     * @param array $params
     * @param int $options CACHED to get cached results
     */
    protected function processGet($endpoint, $params = [], $options = 0) {

        $params['locale'] ??= App::getLocale();

        if($options && self::CACHED) {
            $response = Cache::store(CacheHelper::API_STORE)->remember($this->cacheKeyForEndpoint($endpoint, $params), CacheHelper::DEFAULT_TIME, function() use($endpoint, $params) {
                return Nave::get($endpoint, $params);
            });
        } else {
            $response = Nave::get($endpoint, $params);
        }

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
    
    protected function cacheKeyForEndpoint($endpoint, $params) {
        return $endpoint.http_build_query($params);
    }
    
}
