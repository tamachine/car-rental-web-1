<?php

namespace App\Traits\Nave;

use Illuminate\Support\Collection;

/**
 * This trait returns a series of methods that search in a current all() method where we can get the data from so a 'public function all()' is required
 */
trait SearchInAll {

    /**
     * returns a collection of elements where the $attribute, its like %value%
     * @param string $attribute
     * @param string $value
     * @param string $locale
     * @return Collection|null
     */
    public function like($attribute, $value, $locale = null): Collection|null {
        return collect($this->all($locale))->filter(function ($location) use ($attribute, $value) {
            return str_contains($value, $location->$attribute);
        })->values();
    } 

    /**
     * returns an element from a all method where hashid = $hashid
     * @param string $hashId     
     * @param string $locale
     * @return Object|null
     */
    public function findByHashid($hashId, $locale = null): Object|null {
        return collect($this->all($locale))->first(function ($location) use ($hashId) {
            return $location->hashid == $hashId;
        });
    } 
}