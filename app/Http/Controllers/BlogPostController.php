<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\BlogCategoryRepositoryInterface;
use App\Interfaces\BlogTagRepositoryInterface;
use App\Interfaces\BlogPostRepositoryInterface;
use App\Interfaces\PageRepositoryInterface;
use App\Interfaces\ExtendsWebLayoutInterface;
use App\Models\BlogPost;
use App\Models\SeoConfiguration;
use App\Traits\Nave\ExtendsWebLayout;
use Illuminate\Support\Facades\Route;

class BlogPostController extends Controller implements ExtendsWebLayoutInterface
{
    use ExtendsWebLayout;

    protected $blogPostRepository;

    protected BlogPost|null $blogPost;
 
    public function __construct(BlogPostRepositoryInterface $blogPostRepository) {                     
        $this->blogPostRepository = $blogPostRepository;             
    }

    public function index(string $blog_post_slug)
    {              
        $this->blogPost = $this->findOrfail($this->blogPostRepository->findBySlug($blog_post_slug));

        if(!$this->blogPost->published) {
            abort(404);
        }

        dd($this->blogPost);
        return view('blog.show', $this->webLayoutViewParams());        
    }

    public function getSeoConfiguration(): SeoConfiguration
    {
        return $this->blogPostRepository->seoConfiguration($this->blogPost->slug, Route::currentRouteName());
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
