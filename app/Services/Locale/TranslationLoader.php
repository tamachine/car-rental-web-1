<?php
 
namespace App\Services\Locale;
 
use Cache;
use Illuminate\Translation\FileLoader;
use App\Interfaces\TranslationRepositoryInterface;

class TranslationLoader extends FileLoader
{    
    /**
     * Load the messages for the given locale.
     *
     * @param string $locale
     * @param string $group
     * @param string $namespace
     *
     * @return array
     */
    public function load($locale, $group, $namespace = null)
    {              
        $translations = app(TranslationRepositoryInterface::class);            
        
        $translations = $translations->all($group, $locale); //this method save translations in cache

        $output = [];

        foreach($translations as $translation) {                
            $output[$translation->group][$translation->key] = $translation->text;
        }

        return $output[$group] ?? $output;
   
    }
}