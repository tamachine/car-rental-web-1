<?php

namespace App\Services\NaveCache;

use App\Interfaces\ExtraRepositoryInterface;
use App\Interfaces\NaveCacheInterface;

class ExtraNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $extraRepository;

    public function __construct(ExtraRepositoryInterface $extraRepository) {
        $this->extraRepository = $extraRepository;
    }
    
    public function run() {        
        $this->setAll();                                 
    }

    public function getRepository()
    {
        return $this->extraRepository;
    }    
}