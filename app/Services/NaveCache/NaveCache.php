<?php

namespace App\Services\NaveCache;

use App\Helpers\Cache;
use App\Interfaces\NaveCacheInterface;
use Illuminate\Filesystem\Filesystem;
use ReflectionClass;
use Illuminate\Support\Facades\Log;

/**
 * This class refresh the nave API cache meaning that stores all the endpoint responses in cache so they are available from the client side.
 * As the endpoint calls are already stored in cache if they are not available, we only need to call all of the available endpoints.
 * This will not store things such searchs by string or caren calls.
 * 
 * It calls the run() method for all the classes that implement NaveCacheInterface
 */
class NaveCache {

    protected $classes = [];

    public function __construct() {
        $this->setClassesImplementingNaveCacheInterface();        
    }

    /**
     * Calls the run method for all the classes that implement NaveCacheInterface
     */
    public function run() {
        foreach($this->classes as $class) {
            Log::channel(Cache::LOG_CHANNEL)->info('running NaveCache for ' .  $class);

            $instance = app($class);
            $instance->run();
        }
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