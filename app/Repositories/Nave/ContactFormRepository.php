<?php

namespace App\Repositories\Nave;

use App\Interfaces\ContactFormRepositoryInterface;
use App\Repositories\Nave\BaseRepository;

class ContactFormRepository extends BaseRepository implements ContactFormRepositoryInterface {
    
    /**
     * Send email contact form
     */
    public function send($params): bool {
        
        $endpoint = 'contact-form/submitted';
        
        return $this->processPut($endpoint, $params);
    }      
}