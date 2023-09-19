<?php

namespace App\Repositories\Nave;

use App\Interfaces\NewsletterUserRepositoryInterface;
use App\Repositories\Nave\BaseRepository;

class NewsletterUserRepository extends BaseRepository implements NewsletterUserRepositoryInterface {
    
    /**
     * Submit a newsletter user form
     */
    public function submitted($email): bool {
        $endpoint = 'newsletter-user/submitted';

        $params['email'] = $email;
        
        return $this->processPut($endpoint, $params);
    }      
}
