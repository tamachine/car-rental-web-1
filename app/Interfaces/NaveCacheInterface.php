<?php

namespace App\Interfaces;

interface NaveCacheInterface 
{
    public function run(); //this method will be called from NaveCache class to run the class 
    
    public function setRefreshCache($value); // to check if cache must be deleted before refreshing the cache
}