<?php

namespace App\Models;

class TranslationGroup {
    
    public $name;

    public static function processSingleResponse(string $group) {
        $groupObject = new TranslationGroup();

        $groupObject->name = $group;

        return $groupObject;
    }

    public static function processResponse($data) {
        $response = [];

        foreach($data as $group) {
            $response[] = self::processSingleResponse($group);
        }
        
        return $response;
    }
}