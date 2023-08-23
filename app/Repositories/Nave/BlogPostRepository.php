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

            $image = $blogPost['getFeaturedImageModelImageInstance'];

            if($image) {
                $imageObject = ArrayHelper::mapArrayToObject($image, Image::class);                
            } else {
                $imageObject = new Image();
            }

            $blogPostObject->getFeaturedImageModelImageInstance = $imageObject;

            $image_hover = $blogPost['getFeaturedImageHoverModelImageInstance'];

            if($image_hover) {
                $imageObject = ArrayHelper::mapArrayToObject($image_hover, Image::class);                
            } else {
                $imageObject = new Image();
            }

            $blogPostObject->getFeaturedImageHoverModelImageInstance = $imageObject;
            
            $response[] = $blogPostObject;
        }
        
        return $response;
    }
}
