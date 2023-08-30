<?php

namespace App\Repositories\Nave;

use App\Interfaces\TranslationRepositoryInterface;
use App\Repositories\Nave\BaseRepository;
use Nave; 
use App;
use App\Traits\Nave\HasObjectResponses;

class TranslationRepository extends BaseRepository implements TranslationRepositoryInterface {
    
    use HasObjectResponses;
    
    public function all($group = null, $locale = null): array {       
        $locale ??= App::getLocale();

        $params = [];
        $group  ? $params['group']  = $group : null;
        $locale ? $params['locale'] = $locale : null;        

        $endpoint = 'translations';
                
        return $this->processGet($endpoint, $params);
    }
   
}
