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

    /**
     * Flattens a multi-dimensional array into a single-dimensional array using dot notation.
     *
     * @param  array  $params  The array to be flattened.
     * @param  string $prefix  The prefix for the flattened key (used for recursion).
     * @return array  The flattened array.
     */
    public static function flattenParams($params, $prefix = '') {
        $flattened = [];
        
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                $flattened += self::flattenParams($value, $prefix . $key . '.');
            } else {
                $flattened[$prefix . $key] = $value;
            }
        }
        return $flattened;
    }
}
