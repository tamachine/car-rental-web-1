<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\PageRepositoryInterface;
use App\Interfaces\ExtendsWebLayoutInterface;
use App\Models\SeoConfiguration;
use App\Traits\Nave\ExtendsWebLayout;
use Illuminate\Support\Facades\Route;
/**
 * TODO
 */
class BlogSearchAllController extends Controller implements ExtendsWebLayoutInterface
{
    use ExtendsWebLayout;

    protected $pageRepository;
    
    public function __construct(PageRepositoryInterface $pageRepository) {                     
        $this->pageRepository = $pageRepository;             
    }

    public function index()
    {        
        return view('blog.search.all', $this->webLayoutViewParams());                  
    }

    public function getSeoConfiguration(): SeoConfiguration
    {
        return $this->pageRepository->seoConfiguration(Route::currentRouteName());
    }

    public function footerImagePath() : string
    {       
        return asset('/images/footer/home.png');
    }

    public function footerWebpImagePath() : string
    {       
        return asset('/images/footer/home.webp');
    }

   
}
