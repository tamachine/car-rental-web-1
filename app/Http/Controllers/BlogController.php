<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\BlogCategoryRepositoryInterface;
use App\Interfaces\BlogTagRepositoryInterface;
use App\Interfaces\BlogPostRepositoryInterface;
use App\Interfaces\PageRepositoryInterface;
use App\Interfaces\ExtendsWebLayoutInterface;
use App\Models\SeoConfiguration;
use App\Traits\Nave\ExtendsWebLayout;
use Illuminate\Support\Facades\Route;

class BlogController extends Controller implements ExtendsWebLayoutInterface
{
    use ExtendsWebLayout;

    protected $blogTagRepository;

    protected $blogPostRepository;

    protected $pageRepository;   
    
    public function __construct(BlogTagRepositoryInterface $blogTagRepository, BlogPostRepositoryInterface $blogPostRepository, PageRepositoryInterface $pageRepository) {              
        $this->blogTagRepository  = $blogTagRepository;       
        $this->blogPostRepository = $blogPostRepository;    
        $this->pageRepository     = $pageRepository;    
    }

    public function index()
    {              
        return view(
            'blog.index', 
            array_merge(
                $this->webLayoutViewParams(),
                [
                    'tags'   => $this->blogTagRepository->all(),
                    'latest' => $this->blogPostRepository->latest(4),
                    'hero'   => $this->blogPostRepository->hero(),
                    'top'    => $this->blogPostRepository->top(),                    
                    'breadcrumbs' => getBreadcrumb(['home', 'blog']),                
                ]
            )
        );
    }

    public function getSeoConfiguration(): SeoConfiguration
    {
        return $this->pageRepository->seoConfiguration(Route::currentRouteName());
    }

    public function footerImagePath() : string
    {       
        return '/images/footer/blog.png';
    }

    public function footerWebpImagePath() : string
    {       
        return '/images/footer/blog.webp';
    }

   
}
