<?php

namespace App\Models;

class BlogPost {
    public $hashid;
    public $slug;
    public $title;
    public $published_at;
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
}