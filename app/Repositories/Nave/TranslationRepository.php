<?php

namespace App\Repositories\Nave;

use App\Interfaces\TranslationRepositoryInterface;
use App\Repositories\Nave\BaseRepository;
use App;
use App\Models\Translation;

class TranslationRepository extends BaseRepository implements TranslationRepositoryInterface {
    
    public function all($group = null, $locale = null): array {       
        $locale ??= App::getLocale();

        $params = [];
        $group  ? $params['group']  = $group : null;
        $locale ? $params['locale'] = $locale : null;        

        $endpoint = 'translations';
                
        return Translation::processResponse($this->processGet($endpoint, $params, self::CACHED));
    }
   
}
