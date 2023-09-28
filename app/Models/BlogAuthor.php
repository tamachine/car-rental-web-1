<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class BlogAuthor implements LocalizedUrlRoutable{

    use HasResponses {
        processSingleResponse as public traitProcessSingleResponse;
    }

    public $hashid;
    public $name;
    public $bio;
    public $short_bio;
    public $photo;
    public $url;
    public $slug;

    public function setUrl($value) {
        $this->url = $value;
    }

    public function toJson() {
        return json_encode($this);
    }

    /**
     * override processSingleResponse from HasResponses
     */
    public static function processSingleResponse(array|null $instanceData): object {
        $blogAuthor = self::traitProcessSingleResponse($instanceData);

        $blogAuthor->setUrl(route('blog.search.author', ['blog_author_slug' => $blogAuthor->slug]));

        return $blogAuthor;
    }

    public function getLocalizedRouteKey($locale)
    {
        return $this->slug;
    }
}
