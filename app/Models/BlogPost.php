<?php

namespace App\Models;

use App\Traits\Nave\HasResponses;
use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;

class BlogPost implements LocalizedUrlRoutable {

    use HasResponses {
        processSingleResponse as public traitProcessSingleResponse;
    }

    public $hashid;
    public $slug;
    public array $translatedSlugs;
    public $title;
    public $published_at;
    public $published;
    public $summary;
    public $content;
    public $updated_at;
    public $hero;
    public $top;
    public $show_date;
    public $featured_image_path;
    public $featured_image_hover_path;
    public $featured_image_url;
    public $featured_image_hover_url;
    public $getFeaturedImageModelImageInstance;
    public $getFeaturedImageHoverModelImageInstance;
    public $author;
    public $category;
    public $url;
    public $tags;
    public $related_posts;
    public $prev_post;
    public $next_post;

    public function setUrl($value) {
        $this->url = $value;
    }

    /**
     * Overrides processSingleResponse from HasResponse trait
     */
    public static function processSingleResponse(array|null $instanceData): object {
        $blogPostObject = self::traitProcessSingleResponse($instanceData);

        if(isset($instanceData['author'])) $blogPostObject->author =        BlogAuthor::processSingleResponse($instanceData['author']);
        if(isset($instanceData['category'])) $blogPostObject->category =    BlogCategory::processSingleResponse($instanceData['category']);
        if(isset($instanceData['tags'])) $blogPostObject->tags =            BlogTag::processResponse($instanceData['tags'], BlogTag::class);
        if(isset($instanceData['getFeaturedImageModelImageInstance']))      $blogPostObject->getFeaturedImageModelImageInstance = Image::processSingleResponse($instanceData['getFeaturedImageModelImageInstance']);
        if(isset($instanceData['getFeaturedImageHoverModelImageInstance'])) $blogPostObject->getFeaturedImageHoverModelImageInstance = Image::processSingleResponse($instanceData['getFeaturedImageHoverModelImageInstance']);
        if(isset($instanceData['prev_post'])) $blogPostObject->prev_post =  self::processSingleResponse($instanceData['prev_post']);
        if(isset($instanceData['next_post'])) $blogPostObject->next_post =  self::processSingleResponse($instanceData['next_post']);
        if(isset($instanceData['related_posts'])) $blogPostObject->related_posts = self::processResponse($instanceData['related_posts']);

        $blogPostObject->setUrl(route('blog.show', ['blog_post_slug' => $blogPostObject->slug]));

        return $blogPostObject;
    }

    public function getLocalizedRouteKey($locale)
    {
        return $this->translatedSlugs[$locale];
    }
}
