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

class BlogSearchStringController extends Controller implements ExtendsWebLayoutInterface
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
        return view('blog.search.string', $this->webLayoutViewParams());                
    }

    public function getSeoConfiguration(): SeoConfiguration
    {
        return $this->pageRepository->seoConfiguration(Route::currentRouteName());
    }

    public function footerImagePath() : string
    {       
        return asset('/images/footer/blog.png');
    }

    public function footerWebpImagePath() : string
    {       
        return asset('/images/footer/blog.webp');
    }

   
}
