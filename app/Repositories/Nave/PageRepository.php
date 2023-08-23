<?php

namespace App\Repositories\Nave;

use App\Interfaces\PageRepositoryInterface;
use App\Models\SeoConfiguration;
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\HasSeoConfiguration;

class PageRepository extends BaseRepository implements PageRepositoryInterface {
    
    use HasSeoConfiguration;

    public function all(): array {
        $endpoint = 'pages';

        return $this->processGet($endpoint);
    }

    public function show($name) {
        $endpoint = 'pages/'.$name;

        return $this->processGet($endpoint);
    }

    public function seoConfiguration($name): SeoConfiguration {
        $endpoint = 'pages/'.$name.'/seoconfigurations';        

        return $this->processSeoConfiguration($this->processGet($endpoint, [], self::CACHED));
    }
}
