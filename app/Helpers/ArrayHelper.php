<?php

namespace App\Helpers;

use DateTime;

class ArrayHelper {

    public static function mapArrayToObject(array|null $array, string $className) {

        $object = new $className();

        if($array) {        
            
            foreach($array as $key => $value) {
                if($key == 'created_at' || $key == 'published_at' || $key == 'updated_at') $value = new DateTime($value);
                
                $object->$key = $value;                    
            }

            return $object;
        } 
        
        return $object;
    }    
}
