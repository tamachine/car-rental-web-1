<?php

namespace App\Repositories\Nave;

use App\Interfaces\PageRepositoryInterface;
use App\Models\SeoConfiguration;
use App\Repositories\Nave\BaseRepository;
use App\Traits\Nave\HasObjectResponses;

class PageRepository extends BaseRepository implements PageRepositoryInterface {
        
    use HasObjectResponses;
    
    public function all(): array {
        $endpoint = 'pages';

        return $this->processPageResponse($this->processGet($endpoint, [], self::CACHED));
    }

    public function show($name) {
        $endpoint = 'pages/'.$name;

        return $this->processSinglePageResponse($this->processGet($endpoint, [], self::CACHED));
    }

    public function seoConfiguration($name): SeoConfiguration {
        $endpoint = 'pages/'.$name.'/seoconfigurations';        

        return $this->processSeoConfiguration($this->processGet($endpoint, [], self::CACHED));
    }
}
