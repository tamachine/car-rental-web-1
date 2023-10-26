<?php

namespace App\Services\NaveCache;

use App\Interfaces\ContactFormRepositoryInterface;
use App\Interfaces\NaveCacheInterface;

class ContactFormNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $contactFormRepository;

    public function __construct(ContactFormRepositoryInterface $contactFormRepository) {
        $this->contactFormRepository = $contactFormRepository;
    }
    
    public function run() {        
        $this->contactFormRepository->types();               
    } 
    
    public function getRepository()
    {
        return $this->contactFormRepository;
    }  
}