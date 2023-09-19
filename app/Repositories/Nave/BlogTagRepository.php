<?php

namespace App\Repositories\Nave;

use App\Interfaces\BlogTagRepositoryInterface;
use App\Models\BlogTag;
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\SearchInAll;

class BlogTagRepository extends BaseRepository implements BlogTagRepositoryInterface {
    
    use SearchInAll {
        findByHashid as protected findByHashidFromSearchInAll;
    }

    public function all(bool|null $postsPublisehd = true): array {
        $endpoint = 'post-tags';        

        return BlogTag::processResponse($this->processGet($endpoint, ['postsPublished' => $postsPublisehd], self::CACHED));        
    }    

    public function findByHashid($hashId, $locale = null): BlogTag|null {
        return $this->findByHashidFromSearchInAll($hashId, $locale);
    }

    public function findBySlug($slug): BlogTag|null {
        $endpoint = 'post-tags/'.$slug;

        $data = $this->processGet($endpoint, [], self::CACHED);

        if(empty($data)) return null;

        return BlogTag::processSingleResponse($this->processGet($endpoint, [], self::CACHED));        
    }
}
