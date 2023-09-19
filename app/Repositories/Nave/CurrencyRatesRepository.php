<?php

namespace App\Repositories\Nave;

use App\Interfaces\CurrencyRatesRepositoryInterface;
use App\Repositories\Nave\BaseRepository;

class CurrencyRatesRepository extends BaseRepository implements CurrencyRatesRepositoryInterface {
    
    public function all(): array {
        $endpoint = 'currency-rates';        

        return $this->processGet($endpoint, [], self::CACHED);                    
    }

}
