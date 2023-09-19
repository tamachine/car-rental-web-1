<?php

namespace App\Services\NaveCache;

use App\Interfaces\CurrencyRatesRepositoryInterface;
use App\Interfaces\NaveCacheInterface;

class CurrencyRatesNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $currencyRatesRepository;

    public function __construct(CurrencyRatesRepositoryInterface $currencyRatesRepository) {
        $this->currencyRatesRepository = $currencyRatesRepository;
    }
    
    public function run() {        
        $this->setAll();                            
    }

    public function getRepository()
    {
        return $this->currencyRatesRepository;
    }    
}