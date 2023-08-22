<?php

namespace App\Helpers;

class ArrayHelper {

    public static function mapArrayToObject(array $array, object $object) {
        
        foreach($array as $key => $value) {
            $object->$key = $value;                    
        }

        return $object;
        
    }
}