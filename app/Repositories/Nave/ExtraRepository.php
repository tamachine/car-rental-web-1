<?php

namespace App\Repositories\Nave;

use App\Interfaces\ExtraRepositoryInterface;
use App\Models\CarExtra;
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\SearchInAll;

class ExtraRepository extends BaseRepository implements ExtraRepositoryInterface {
    
    use SearchInAll {
        findByHashid as protected findByHashidFromSearchInAll;
    }

    public function all(): array {          
        $endpoint = 'extras';
        
        return CarExtra::processResponse($this->processGet($endpoint, [], self::CACHED));
    }      

    public function findByHashid($hashId, $locale = null): CarExtra|null {
        return $this->findByHashidFromSearchInAll($hashId, $locale);
    }
    
}
