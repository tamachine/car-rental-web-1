<?php

namespace App\Repositories\Nave;

use App\Interfaces\FaqRepositoryInterface;
use App\Models\Faq;
use App\Repositories\Nave\BaseRepository;

class FaqRepository extends BaseRepository implements FaqRepositoryInterface {    

    public function all(): array {
        $endpoint = 'faqs';

        return Faq::processResponse($this->processGet($endpoint, [], self::CACHED));
    }       
}
