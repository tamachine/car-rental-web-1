<?php

namespace App\Repositories\Nave;

use App\Interfaces\BlogPostRepositoryInterface;
use App\Helpers\ArrayHelper;
use App\Models\BlogPost;
use App\Models\Image;
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\HasSeoConfiguration;
use App\Models\SeoConfiguration;
use Illuminate\Support\Collection;

class BlogPostRepository extends BaseRepository implements BlogPostRepositoryInterface {
    
    use HasSeoConfiguration;

    public function all(): array {
        $endpoint = 'posts';        

        return $this->processArrayToObject($this->processGet($endpoint, [], self::CACHED), BlogPost::class);
    }

    public function latest($take = 3): Collection {
        return collect($this->all())->take($take);        
    }

    public function hero(): Collection {
        return collect($this->all())->filter(function($post) {
            return ($post->hero);
        }); 
    }

    public function top(): Collection {
        return collect($this->all())->filter(function($post) {
            return ($post->top);
        }); 
    }

    public function seoConfiguration($blogPostSlug, $pageRouteName): SeoConfiguration { 
        $endpoint = 'posts/'.$blogPostSlug.'/seoconfigurations/'. $pageRouteName;        

        return $this->processSeoConfiguration($this->processGet($endpoint, [], self::CACHED));
    }

    protected function processBlogPostResponse($data): array {
        $response = [];

        foreach($data as $blogPost) {
            $blogPostObject = ArrayHelper::mapArrayToObject($blogPost, BlogPost::class);

            $blogPostObject->getFeaturedImageModelImageInstance      = ArrayHelper::mapArrayToObject($blogPost['getFeaturedImageModelImageInstance'], Image::class); 
            $blogPostObject->getFeaturedImageHoverModelImageInstance = ArrayHelper::mapArrayToObject($blogPost['getFeaturedImageHoverModelImageInstance'], Image::class);
            
            $response[] = $blogPostObject;
        }
        
        return $response;
    }    
}
