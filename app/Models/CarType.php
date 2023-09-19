<?php

namespace App\Models;

use App;
use App\Traits\Nave\HasResponses;

class CarType {

    use HasResponses;

    public $id;
    public $text;
    public $imagePath;

    public function getTextTranslated() {
        $locale = App::getLocale();

        return $this->text[$locale];
    }    
}