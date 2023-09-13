<?php

namespace App\Services\NaveCache;

use App\Helpers\Language;
use App\Interfaces\TranslationRepositoryInterface;
use App\Interfaces\NaveCacheInterface;
use App\Interfaces\TranslationGroupRepositoryInterface;
use App\Models\TranslationGroup;

class TranslationNaveCache extends BaseNaveCache implements NaveCacheInterface {

    protected $translationRepository;

    public function __construct(TranslationRepositoryInterface $translationRepository) {
        $this->translationRepository = $translationRepository;
    }
    
    public function run() {        
        $this->setAll();                                    
    }

    public function getRepository()
    {
        return $this->translationRepository;
    }
    
    public function setAll() {
        $translationGroupsRepository = app(TranslationGroupRepositoryInterface::class); 
        
        $translationGroupsRepository->setRefreshCache($this->refreshCache);

        $groups = $translationGroupsRepository->all();

        $this->addGlobalGroup($groups);

        $this->translationRepository->setRefreshCache($this->refreshCache);
        
        foreach($groups as $group) {
            
            foreach(Language::availableCodes() as $locale) {
                
                $this->log('calling translations for group:'. $group->name . ' and locale:' . $locale);
                
                $this->translationRepository->all($group->name, $locale);
            }
        }
    }

    /**
     * Adds the group '*' that laravel adds in the translation loader
     */
    protected function addGlobalGroup(array &$groups) {
        $globalObject = new TranslationGroup();
        $globalObject->name = '*';

        $groups[] = $globalObject;
    }
}