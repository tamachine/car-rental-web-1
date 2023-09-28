<?php

namespace App\Repositories\Nave;

use App\Interfaces\ContactFormRepositoryInterface;
use App\Repositories\Nave\BaseRepository;

class ContactFormRepository extends BaseRepository implements ContactFormRepositoryInterface {
    
    /**
     * Contact form types
     */
    public function types(): array {

        $endpoint = 'contact-form/types';        

        return $this->processGet($endpoint, [] , self::CACHED);        
    } 

    /**
     * Send email contact form
     */
    public function send($params): bool {
        
        $endpoint = 'contact-form/submitted';
        
        return $this->processPut($endpoint, $params);
    }      
}