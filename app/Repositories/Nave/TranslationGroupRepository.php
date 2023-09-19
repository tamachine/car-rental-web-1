<?php

namespace App\Repositories\Nave;

use App\Repositories\Nave\BaseRepository;
use App\Interfaces\TranslationGroupRepositoryInterface;
use App\Models\TranslationGroup;

class TranslationGroupRepository extends BaseRepository implements TranslationGroupRepositoryInterface {
    
    public function all(): array {                      
        $endpoint = 'translation-groups';
                
        return TranslationGroup::processResponse($this->processGet($endpoint, [], self::CACHED));
    }
   
}
