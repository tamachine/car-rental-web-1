<?php

namespace App\Repositories\Nave;

use App\Interfaces\BlogPostRepositoryInterface;
use Nave; 
use App\Repositories\Nave\BaseRepository;

class BlogPostRepository extends BaseRepository implements BlogPostRepositoryInterface {
    
    public function all(): array {
        $endpoint = 'posts';        

        return $this->processGet($endpoint);
    }

    public function latest(): array {
        $endpoint = 'posts';        
        
        return $this->processGet($endpoint, ['latest' => 3]);
    }
}
