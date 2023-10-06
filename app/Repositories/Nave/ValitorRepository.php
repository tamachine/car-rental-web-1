<?php

namespace App\Repositories\Nave;

use App\Interfaces\ValitorRepositoryInterface;
use App\Models\Valitor;

class ValitorRepository extends BaseRepository implements ValitorRepositoryInterface {
    
    /**
     * @param string $bookingHashid   
     */
    public function params(string $bookingHashid): Valitor {

        $endpoint = 'valitor/requestParams/' . $bookingHashid;

        $params['url_ok'] = route('success');
        $params['url_ko'] = route('success');

        return Valitor::processSingleResponse($this->processGet($endpoint, $params, self::CACHED));
    }

    public function checkResponse(array $valitor_response, string $bookingHashid): bool {

        $endpoint = 'valitor/checkResponse/'.$bookingHashid;

        $params['valitor_response'] = $valitor_response;

        return $this->processResponse($this->processGet($endpoint, $params));

    }
}