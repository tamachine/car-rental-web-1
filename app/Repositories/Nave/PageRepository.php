<?php

namespace App\Repositories\Nave;

use App\Interfaces\PageRepositoryInterface;
use App\Models\Page;
use App\Models\SeoConfiguration;
use App\Repositories\Nave\BaseRepository;

class PageRepository extends BaseRepository implements PageRepositoryInterface {
    
    public function all(string $class_name = null): array {
        $endpoint = 'pages';

        $params = [];
        
        if(isset($class_name)) $params['class_name'] = $class_name;

        return Page::processResponse($this->processGet($endpoint, $params, self::CACHED));
    }

    public function show($name) {
        $endpoint = 'pages/'.$name;

        return Page::processSingleResponse($this->processGet($endpoint, [], self::CACHED));
    }

    public function seoConfiguration($name): SeoConfiguration {
        $endpoint = 'pages/'.$name.'/seoconfigurations';        

        return SeoConfiguration::processSingleResponse($this->processGet($endpoint, [], self::CACHED));
    }
}
