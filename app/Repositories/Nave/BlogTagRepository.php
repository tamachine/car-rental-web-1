<?php

namespace App\Repositories\Nave;

use App\Interfaces\BlogTagRepositoryInterface;
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\HasSeoConfiguration;
use App\Models\BlogTag;

class BlogTagRepository extends BaseRepository implements BlogTagRepositoryInterface {
    
    use HasSeoConfiguration;

    public function all(bool $postsPublisehd = true): array {
        $endpoint = 'posttags';        

        return $this->processArrayToObject($this->processGet($endpoint, ['postsPublished' => $postsPublisehd], self::CACHED), BlogTag::class);
    }

    

    
}
