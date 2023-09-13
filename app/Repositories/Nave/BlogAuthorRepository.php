<?php

namespace App\Repositories\Nave;

use App\Interfaces\BlogAuthorRepositoryInterface;
use App\Models\BlogAuthor;
use App\Models\BlogPost;
use App\Models\SeoConfiguration;
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\SearchInAll;

class BlogAuthorRepository extends BaseRepository implements BlogAuthorRepositoryInterface {
      
    use SearchInAll;
    
    public function all(): array {
        $endpoint = 'postauthors';        

        return $this->processArrayToObjects($this->processGet($endpoint, [], self::CACHED), BlogAuthor::class);                    
    }

    public function findBySlug($slug): BlogAuthor|null {
        $endpoint = 'postauthors/'.$slug;

        $data = $this->processGet($endpoint, [], self::CACHED);

        if(empty($data)) return null;

        return BlogAuthor::processSingleResponse($this->processGet($endpoint, [], self::CACHED));

    }

    public function seoConfiguration($blogAuthorSlug, $pageRouteName): SeoConfiguration { 
        $endpoint = 'postauthors/'.$blogAuthorSlug.'/seoconfigurations/'. $pageRouteName;        

        return SeoConfiguration::processSingleResponse($this->processGet($endpoint, [], self::CACHED));
    }   

    public function posts(string $author_hashid, string|null $search = null, string|null $tag_hash_id = null): array {
        $endpoint = 'posts';  

        $params['author_hashid'] = $author_hashid;

        if(isset($search)) {
            $params['search'] = $search;
        }

        if(isset($tag_hash_id)) {
            $params['tag_hash_id'] = $tag_hash_id;
        }

        return BlogPost::processResponse($this->processGet($endpoint, $params, self::CACHED));
    }
   
}
