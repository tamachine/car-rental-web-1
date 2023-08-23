<?php

namespace App\Models;

class BlogPost {
    public $hashid;
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
    public $getFeaturedImageModelImageInstance;
    public $getFeaturedImageHoverModelImageInstance;
    public $author;
    public $category;
    public $url = '#'; //TODO
}