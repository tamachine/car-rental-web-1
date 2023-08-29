<?php

namespace App\Repositories\Nave;

use App\Interfaces\BlogTagRepositoryInterface;
use App\Repositories\Nave\BaseRepository;
use App\Models\BlogTag;

class BlogTagRepository extends BaseRepository implements BlogTagRepositoryInterface {
    
    public function all(bool $postsPublisehd = true): array {
        $endpoint = 'posttags';        

        return $this->processBlogTagResponse($this->processGet($endpoint, ['postsPublished' => $postsPublisehd], self::CACHED), BlogTag::class);        
    }    
}
