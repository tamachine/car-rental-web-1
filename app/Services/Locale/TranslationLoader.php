<?php
 
namespace App\Services\Locale;
 
use Cache;
use Illuminate\Translation\FileLoader;
use App\Interfaces\TranslationRepositoryInterface;
use App\Helpers\Cache as CacheHelper;

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
        return Cache::store(CacheHelper::TRANSLATIONS_STORE)->remember($this->getCacheKey($group, $locale), CacheHelper::DEFAULT_TIME, function () use ($locale, $group) {    
            $translations = app(TranslationRepositoryInterface::class);            
            
            $translations = $translations->all($group, $locale);

            $output = [];

            foreach($translations as $data) {                
                $output[$data['group']][$data['key']] = $data['text'];
            }

            return $output[$group] ?? $output;
        });          
    }

    protected function getCacheKey(string $group, string $locale): string
    {
        return "api.translation-loader.{$group}.{$locale}";
    }
}