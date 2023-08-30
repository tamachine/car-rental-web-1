<?php

namespace App\Repositories\Nave;

use App\Interfaces\FaqRepositoryInterface;
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\HasObjectResponses;

class FaqRepository extends BaseRepository implements FaqRepositoryInterface {    

    use HasObjectResponses;
    
    public function all(): array {
        $endpoint = 'faqs';

        return $this->processFaqResponse($this->processGet($endpoint));
    }       
}
