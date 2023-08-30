<?php

namespace App\Repositories\Nave;

use App\Interfaces\BlogPostRepositoryInterface;
use App\Models\BlogPost;
use App\Repositories\Nave\BaseRepository;
use App\Models\SeoConfiguration;
use App\Traits\Nave\HasObjectResponses;
use Illuminate\Support\Collection;

class BlogPostRepository extends BaseRepository implements BlogPostRepositoryInterface {
    
    use HasObjectResponses;
    
    public function all(): array {
        $endpoint = 'posts';        

        return $this->processBlogPostResponse($this->processGet($endpoint, [], self::CACHED));                    
    }

    public function latest($take = 3): Collection {
        return collect($this->all())->take($take);        
    }

    public function hero(): Collection {        
        return collect($this->all())->filter(function($post) {
            return $post->hero;
        }); 
    }

    public function top(): Collection {
        return collect($this->all())->filter(function($post) {
            return $post->top;
        }); 
    }

    public function seoConfiguration($blogPostSlug, $pageRouteName): SeoConfiguration { 
        $endpoint = 'posts/'.$blogPostSlug.'/seoconfigurations/'. $pageRouteName;        

        return $this->processSeoConfiguration($this->processGet($endpoint, [], self::CACHED));
    }   
}
