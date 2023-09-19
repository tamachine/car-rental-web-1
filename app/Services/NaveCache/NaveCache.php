<?php

namespace App\Services\NaveCache;

use App\Helpers\Cache as CacheHelper;
use App\Interfaces\NaveCacheInterface;
use Illuminate\Filesystem\Filesystem;
use ReflectionClass;
use Illuminate\Support\Facades\Log;
use Cache;

/**
 * This class loads the nave API cache meaning that stores all the endpoint responses in cache so they are available from the client side.
 * As the endpoint calls are already stored in cache if they are not available, we only need to call all of the available endpoints.
 * This will not store things such searchs by string or caren calls.
 * 
 */
class NaveCache {

    protected $classes = [];

    protected $clearCache = false;

    public function __construct() {        
        $this->setClassesImplementingNaveCacheInterface();        
    }

    public function getClasses() {
        return $this->classes;
    }

    public function filterClasses(array $classes) {
        $this->classes = array_filter($this->classes, function($value) use ($classes) {
            foreach ($classes as $search) {
                if (strpos($value, $search) !== false) {
                    return true;
                }
            }
            return false;
        });
    }

    /**
     * Calls the run() method for all the classes that implement NaveCacheInterface
     */
    public function run() {        
        foreach($this->classes as $class) {
            Log::channel(CacheHelper::LOG_CHANNEL)->info('running NaveCache for ' .  $class);

            $instance = app($class);
            $instance->setRefreshCache($this->clearCache);
            $instance->run();
        }
    }

    /**
     * Sets the clear cache property in order to clear the current cache before calling the endpoints or not
     */
    public function setClearCache($value) {
        $this->clearCache = $value;
    }

    /**
     * Clear the cache and then run
     */
    public function clearAndRun() {    
        $this->setClearCache(true);         
        $this->run();
    }

    /**
     * Set the property classes to the classes that implement NaveCacheInterface
     */
    public function setClassesImplementingNaveCacheInterface(string $namespace = 'App\Services\NaveCache') {        
        $filesystem = new Filesystem();
    
        // Define the path based on the namespace. 
        // For 'App\Services\NaveCache', the path would be 'app/Services/NaveCache'
        $path = app_path(str_replace('\\', '/', str_replace('App\\', '', $namespace)));
    
        // Get all PHP files in the directory
        $files = $filesystem->allFiles($path);
    
        foreach ($files as $file) {
            // Convert the file path to a namespaced class name
            $relativePath = str_replace($path . '/', '', $file->getRealPath());
            $className = $namespace . '\\' . str_replace(['/', '.php'], ['\\', ''], $relativePath);
    
            // Use reflection to check if the class implements the interface
            if (class_exists($className)) {
                $reflection = new ReflectionClass($className);
                if ($reflection->implementsInterface(NaveCacheInterface::class)) {
                    $this->classes[] = $className;
                }
            }
        }
            
    }    
}