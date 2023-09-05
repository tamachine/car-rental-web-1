<?php

namespace App\Models;

class BlogAuthor {
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
}