<?php

namespace App\Repositories\Nave;

use App\Interfaces\BlogPostRepositoryInterface;
use Nave; 
use App\Repositories\Nave\BaseRepository;

class BlogPostRepository extends BaseRepository implements BlogPostRepositoryInterface {
    
    public function all(): array {
        $endpoint = 'posts';

        $response = Nave::get($endpoint);

        return $this->processResponse($response);
    }

    public function latest(): array {
        $endpoint = 'posts';

        $response = Nave::get($endpoint, ['latest' => 3]);

        return $this->processResponse($response);    
    }
}
