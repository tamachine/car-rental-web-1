<?php

namespace App\Repositories\Nave;

use App\Helpers\ArrayHelper;
use App\Interfaces\BlogAuthorRepositoryInterface;
use App\Models\BlogAuthor;
use App\Models\SeoConfiguration;
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\HasObjectResponses;
use App\Traits\Nave\SearchInAll;

class BlogAuthorRepository extends BaseRepository implements BlogAuthorRepositoryInterface {
    
    use HasObjectResponses;   
    
    use SearchInAll;
    
    public function findBySlug($slug): BlogAuthor|null {
        $endpoint = 'postauthors/'.$slug;

        $data = $this->processGet($endpoint, [], self::CACHED);

        if(empty($data)) return null;

        return $this->processSingleBlogAuthorResponse($this->processGet($endpoint, [], self::CACHED));

    }

    public function seoConfiguration($blogAuthorSlug, $pageRouteName): SeoConfiguration { 
        $endpoint = 'postauthors/'.$blogAuthorSlug.'/seoconfigurations/'. $pageRouteName;        

        return $this->processSeoConfiguration($this->processGet($endpoint, [], self::CACHED));
    }   

    public function posts(string $author_hashid, string $search = null, string $tag_hash_id = null): array {
        $endpoint = 'posts';  

        $params['author_hashid'] = $author_hashid;

        if(isset($search)) {
            $params['search'] = $search;
        }

        if(isset($tag_hash_id)) {
            $params['tag_hash_id'] = $tag_hash_id;
        }

        return $this->processBlogPostResponse($this->processGet($endpoint, $params, self::CACHED));
    }
   
}
