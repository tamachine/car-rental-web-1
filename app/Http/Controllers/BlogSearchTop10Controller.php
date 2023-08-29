<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\BlogTagRepositoryInterface;
use App\Interfaces\BlogPostRepositoryInterface;
use App\Interfaces\PageRepositoryInterface;
use App\Interfaces\ExtendsWebLayoutInterface;
use App\Models\SeoConfiguration;
use App\Traits\Nave\ExtendsWebLayout;
use Illuminate\Support\Facades\Route;
/**
 * TODO
 */
class BlogSearchTop10Controller extends Controller implements ExtendsWebLayoutInterface
{
    use ExtendsWebLayout;

    protected $blogTagRepository;

    protected $blogPostRepository;

    protected $pageRepository;
    
    public function __construct(BlogTagRepositoryInterface $blogTagRepository, BlogPostRepositoryInterface $blogPostRepository, PageRepositoryInterface $pageRepository) {
        $this->blogTagRepository  = $blogTagRepository;       
        $this->blogPostRepository = $blogPostRepository;    
        $this->pageRepository = $pageRepository;    
    }

    public function index()
    {        
        echo "blog search top 10";                  
    }

    public function getSeoConfiguration(): SeoConfiguration
    {
        return $this->pageRepository->seoConfiguration(Route::currentRouteName());
    }

    public function footerImagePath() : string
    {       
        return '/images/footer/home.png';
    }

    public function footerWebpImagePath() : string
    {       
        return '/images/footer/home.webp';
    }

   
}
