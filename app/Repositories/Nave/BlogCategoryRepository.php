<?php

namespace App\Repositories\Nave;

use App\Interfaces\BlogCategoryRepositoryInterface;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\SeoConfiguration;
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\SearchInAll;

class BlogCategoryRepository extends BaseRepository implements BlogCategoryRepositoryInterface {
    
    use SearchInAll;

    public function all(bool $postsPublisehd = true): array {
        $endpoint = 'postcategories';        

        return $this->processArrayToObjects($this->processGet($endpoint, ['postsPublished' => true], self::CACHED), BlogCategory::class);                    
    }

    public function posts(string $category_hashid, string|null $search = null, string|null $tag_hash_id = null): array {
        $endpoint = 'posts';  

        $params['category_hashid'] = $category_hashid;

        if(isset($search)) {
            $params['search'] = $search;
        }

        if(isset($tag_hash_id)) {
            $params['tag_hash_id'] = $tag_hash_id;
        }

        return BlogPost::processResponse($this->processGet($endpoint,  $params, self::CACHED));
    }

    public function findBySlug($slug): BlogCategory|null {
        $endpoint = 'postcategories/'.$slug;

        $data = $this->processGet($endpoint, [], self::CACHED);

        if(empty($data)) return null;

        return BlogCategory::processSingleResponse($this->processGet($endpoint, [], self::CACHED));

    }

    public function seoConfiguration($blogCategorySlug, $pageRouteName): SeoConfiguration { 
        $endpoint = 'postcategories/'.$blogCategorySlug.'/seoconfigurations/'. $pageRouteName;        

        return seoConfiguration::processSingleResponse($this->processGet($endpoint, [], self::CACHED));
    }  
}
