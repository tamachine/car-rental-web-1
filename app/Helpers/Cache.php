<?php

namespace App\Helpers;

class Cache {
    const LOG_CHANNEL = 'nave_cache'; // the channel for the NaveCache logs
    const DEFAULT_TIME = 7200; //seconds (2 hours - 7200 seconds) for every endpoint call to be stored in the cache    
    const SHORT_TIME = 300; //seconds (5 minutes - 300 seconds) for endpoints that needs short cache time
    const API_STORE = 'api'; //cache store for all the endpoints    
}