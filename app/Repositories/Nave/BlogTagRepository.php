<?php

namespace App\Repositories\Nave;

use App\Interfaces\BlogTagRepositoryInterface;
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\HasObjectResponses;

class BlogTagRepository extends BaseRepository implements BlogTagRepositoryInterface {
    
    use HasObjectResponses;

    public function all(bool $postsPublisehd = true): array {
        $endpoint = 'posttags';        

        return $this->processBlogTagResponse($this->processGet($endpoint, ['postsPublished' => $postsPublisehd], self::CACHED));        
    }    
}
