<?php

namespace App\Models;

use App\Interfaces\BlogCategoryRepositoryInterface;
use Illuminate\Support\Collection;

class BlogCategory {
    public $hashid;
    public $name;
    public $slug;
    public $url;

    protected $blogCategoryRepository;
    
    public function __construct() {
        $this->blogCategoryRepository = app(BlogCategoryRepositoryInterface::class);                    
    }

    public function postsPublished(): Collection {
        return collect($this->blogCategoryRepository->posts($this->hashid));
    }

    public function setUrl($value) {
        $this->url = $value;
    }

    public function toJson() {
        return json_encode($this);
    }
}