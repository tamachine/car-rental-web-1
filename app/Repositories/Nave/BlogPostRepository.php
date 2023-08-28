<?php

namespace App\Repositories\Nave;

use App\Interfaces\BlogPostRepositoryInterface;
use App\Helpers\ArrayHelper;
use App\Models\BlogPost;
use App\Models\Image;
use App\Repositories\Nave\BaseRepository;

class BlogPostRepository extends BaseRepository implements BlogPostRepositoryInterface {
    
    public function all(): array {
        $endpoint = 'posts';        

        return $this->processGet($endpoint, self::CACHED);
    }

    public function latest(): array {
        $endpoint = 'posts';        
        
        return $this->processBlogPostResponse($this->processGet($endpoint, ['latest' => 3], self::CACHED));
    }

    protected function processBlogPostResponse($data): array {
        $response = [];

        foreach($data as $blogPost) {
            $blogPostObject = ArrayHelper::mapArrayToObject($blogPost, BlogPost::class);

            $blogPostObject->getFeaturedImageModelImageInstance = ArrayHelper::mapArrayToObject($blogPost['getFeaturedImageModelImageInstance'], Image::class); 

            $blogPostObject->getFeaturedImageHoverModelImageInstance = ArrayHelper::mapArrayToObject($blogPost['getFeaturedImageHoverModelImageInstance'], Image::class);
            
            $response[] = $blogPostObject;
        }
        
        return $response;
    }    
}
