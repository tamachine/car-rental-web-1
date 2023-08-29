<?php

namespace App\Repositories\Nave;

use App\Interfaces\BlogTagRepositoryInterface;
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\HasSeoConfiguration;
use App\Models\BlogTag;
use App\Models\BlogTagColor;
use App\Helpers\ArrayHelper;

class BlogTagRepository extends BaseRepository implements BlogTagRepositoryInterface {
    
    use HasSeoConfiguration;

    public function all(bool $postsPublisehd = true): array {
        $endpoint = 'posttags';        

        return $this->processBlogTagResponse($this->processGet($endpoint, ['postsPublished' => $postsPublisehd], self::CACHED), BlogTag::class);
    }

    protected function processBlogTagResponse($data): array {
        $response = [];

        foreach($data as $blogTag) {
            $blogTagObject = ArrayHelper::mapArrayToObject($blogTag, BlogTag::class);

            $blogTagObject->color = ArrayHelper::mapArrayToObject($blogTag['color'], blogTagColor::class); 
            
            $response[] = $blogTagObject;
        }
        
        return $response;
    }    

    
}
