<?php

namespace App\Repositories\Nave;

use Nave;
use App;
use Cache;
use App\Helpers\Cache as CacheHelper;
use App\Helpers\ArrayHelper;
use App\Traits\Nave\HasObjectResponses;

class BaseRepository {

    use HasObjectResponses;

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
    
    /**
     * Map as objects all the items in param array as a 'className' instances
     * @param array $array the data array response
     * @param string $className The class name to be maped
     * @return array $response
     */
    protected function processArrayToObject($array, $className) {
        $response = [];

        foreach($array as $value) {                        
            $response[] = ArrayHelper::mapArrayToObject($value, $className); 
        }
        
        return $response;
    }

    protected function cacheKeyForEndpoint($endpoint, $params) {
        return $endpoint.http_build_query($params);
    }    
    
}
