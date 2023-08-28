<?php

namespace App\Helpers;

class ArrayHelper {

    public static function mapArrayToObject(array|null $array, string $className) {

        $object = new $className();

        if($array) {        
            
            foreach($array as $key => $value) {
                $object->$key = $value;                    
            }

            return $object;
        } 
        
        return $object;
    }    
}