<?php

namespace App\Repositories\Nave;

use App\Interfaces\BlogCategoryRepositoryInterface;
use App\Models\BlogCategory;
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\HasObjectResponses;

class BlogCategoryRepository extends BaseRepository implements BlogCategoryRepositoryInterface {
    
    use HasObjectResponses;

    public function all(bool $postsPublisehd = true): array {
        $endpoint = 'postcategories';        

        return $this->processArrayToObject($this->processGet($endpoint, ['postsPublished' => true], self::CACHED), BlogCategory::class);                    
    }

    public function posts(string $category_hashid): array {
        $endpoint = 'posts';  

        return $this->processBlogPostResponse($this->processGet($endpoint, ['category_hashid' => $category_hashid], self::CACHED));
    }
}
