<?php

namespace App\Models;

use App;

class CarType {
    public $id;
    public $text = [];
    public $imagePath;

    public function getTextTranslated() {
        $locale = App::getLocale();

        return $this->text[$locale];
    }
}