<?php

namespace App\Repositories\Nave;

use Nave;
use App;
use Cache;
use App\Helpers\Cache as CacheHelper;
use App\Helpers\ArrayHelper;

class BaseRepository {

    //options for processGet
    const CACHED = 1;    // cached endpoint for the default time CacheHelper::DEFAULT_TIME
    const SHORT_TIME_CACHED = 2;  // cached endpoint for short time CacheHelper::SHORT_TIME

    //set to true if the cache must be clear for the processGet method
    protected $refreshCache = false;

    /**
     * Set refreshCache to true in order to clear the corresponding endpoint cache before return the data
     */
    public function setRefreshCache($value) {
        $this->refreshCache = $value;
    }

    /**
     * returns the Nave::sendHttpRequest('get' ...) response
     * @param string $endpoint
     * @param array $params
     * @param int $options self::CACHED to get cached results
     */
    protected function processGet($endpoint, $params = [], $options = 0) {

        $params['locale'] ??= App::getLocale();

        if($this->refreshCache) {
            Cache::store(CacheHelper::API_STORE)->forget($this->cacheKeyForEndpoint($endpoint, $params));
        }

        if(($options & self::CACHED) || ($options & self::SHORT_TIME_CACHED)) {
            $cacheTime = ($options & self::CACHED) ? CacheHelper::DEFAULT_TIME : CacheHelper::SHORT_TIME;

            $response = Cache::store(CacheHelper::API_STORE)->remember($this->cacheKeyForEndpoint($endpoint, $params), $cacheTime, function() use($endpoint, $params) {
                return Nave::sendHttpRequest('get', $endpoint, $params);
            });
        } else {
            $response = Nave::sendHttpRequest('get', $endpoint, $params);
        }

        return $this->processResponse($response);
    }

    /**
     * returns the Nave::sendHttpRequest('put' ...) response
     * @param string $endpoint
     * @param array $params
     */
    protected function processPut($endpoint, $params = []) {
        $response = Nave::sendHttpRequest('put', $endpoint, $params);

        if(isset($response['success'])) {
            return $response['success'];
        }
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
    protected function processArrayToObjects($array, $className) {
        $response = [];

        foreach($array as $value) {
            $response[] = ArrayHelper::mapArrayToObject($value, $className);
        }

        return $response;
    }

    protected function cacheKeyForEndpoint($endpoint, $params) {
        return $endpoint.http_build_query(ArrayHelper::flattenParams($params));
    }

}
