<?php

namespace App\Repositories\Nave;

use App\Helpers\ArrayHelper;
use App\Interfaces\BlogPostRepositoryInterface;
use App\Models\BlogPost;
use App\Repositories\Nave\BaseRepository;
use App\Models\SeoConfiguration;
use App\Traits\Nave\HasObjectResponses;
use Illuminate\Support\Collection;

class BlogPostRepository extends BaseRepository implements BlogPostRepositoryInterface {
    
    use HasObjectResponses;
    
    public function all(string $search = null, string $tag_hashid = null): array {
        $endpoint = 'posts';  
        
        $params = [];
        
        if(isset($search))      $params['search'] = $search;
        if(isset($tag_hashid))  $params['tag_hash_id'] = $tag_hashid;

        return $this->processBlogPostResponse($this->processGet($endpoint, $params, self::CACHED));                    
    }

    public function findBySlug($slug): BlogPost|null {
        $endpoint = 'posts/'.$slug;

        $data = $this->processGet($endpoint, [], self::CACHED);

        if(empty($data)) return null;

        return $this->processSingleBlogPostResponse($this->processGet($endpoint, [], self::CACHED));        
    }

    public function latest($take = 3): Collection {
        return collect($this->all())->take($take);        
    }

    public function hero(): Collection {        
        return collect($this->all())->filter(function($post) {
            return $post->hero;
        }); 
    }

    public function top(string $search = null, string $tag_hashid = null): Collection {
        return collect($this->all($search, $tag_hashid))->filter(function($post) {
            return $post->top;
        }); 
    }

    public function seoConfiguration($blogPostSlug, $pageRouteName): SeoConfiguration { 
        $endpoint = 'posts/'.$blogPostSlug.'/seoconfigurations/'. $pageRouteName;        

        return $this->processSeoConfiguration($this->processGet($endpoint, [], self::CACHED));
    }    
}
