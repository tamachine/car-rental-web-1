<?php

namespace App\Models;

use App\Helpers\ArrayHelper;

class Translation {

    public $full_key;
    public $text;
    public $group;
    public $key;

    /**TODO pasarlo a trait */
    public static function processSingleResponse(array|null $translation) {
        return ArrayHelper::mapArrayToObject($translation, self::class);
    }

    /**TODO pasarlo a trait */
    public static function processResponse($data) {
        $response = [];

        foreach($data as $translation) {
            $response[] = self::processSingleResponse($translation);
        }
        
        return $response;
    }
}