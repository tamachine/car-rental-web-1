<?php

namespace App\Helpers;

class ArrayHelper {

    public static function mapArrayToObject(array $array, string $className) {
        $object = new $className();
        
        foreach($array as $key => $value) {
            $object->$key = $value;                    
        }

        return $object;
        
    }
}