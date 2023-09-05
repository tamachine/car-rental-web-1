<?php

namespace App\Models;

class BlogTag {
    public $hashid;
    public $name;
    public $slug;    
    public $color;

    public function toJson() {
        return json_encode($this);
    }
}