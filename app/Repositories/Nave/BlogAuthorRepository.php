<?php

namespace App\Repositories\Nave;

use App\Helpers\ArrayHelper;
use App\Interfaces\BlogAuthorRepositoryInterface;
use App\Models\BlogAuthor;
use App\Models\SeoConfiguration;
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\HasObjectResponses;

class BlogAuthorRepository extends BaseRepository implements BlogAuthorRepositoryInterface {
    
    use HasObjectResponses;    
    
    public function findBySlug($slug): BlogAuthor|null {
        $endpoint = 'postauthors/'.$slug;

        $data = $this->processGet($endpoint, [], self::CACHED);

        if(empty($data)) return null;

        return $this->processSingleBlogAuthorResponse($this->processGet($endpoint, [], self::CACHED));

    }

    public function seoConfiguration($blogAuthorSlug, $pageRouteName): SeoConfiguration { 
        $endpoint = 'posts/'.$blogAuthorSlug.'/seoconfigurations/'. $pageRouteName;        

        return $this->processSeoConfiguration($this->processGet($endpoint, [], self::CACHED));
    }   
   
}
