<?php

namespace App\Repositories\Nave;

use App\Interfaces\PaymentRepositoryInterface;
use App\Models\Valitor;

class PaymentRepository extends BaseRepository implements PaymentRepositoryInterface {
    
    /**
     * @param string $bookingHashid   
     */
    public function valitor(string $bookingHashid): Valitor {

        $endpoint = 'payments/valitor/' . $bookingHashid;

        $params['url_ok'] = route('success');
        $params['url_ko'] = route('success');

        return Valitor::processSingleResponse($this->processGet($endpoint, $params, self::CACHED));
    }
}