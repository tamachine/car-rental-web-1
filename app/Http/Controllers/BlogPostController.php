<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\BlogPostRepositoryInterface;
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

    public function index(BlogPost $blog_post)
    {
        $this->blogPost = $blog_post;

        if(!$this->blogPost->published) {
            abort(404);
        }

        return $this->postView();
    }

    public function preview(string $blog_post_slug) {

        if(request()->has('token')) {
            $this->blogPost = $this->blogPostRepository->preview(request()->input('token'), $blog_post_slug);

            if($this->blogPost) {
                $this->blogPost->published_at = now();

                return $this->postView();
            }
        }

        abort(404);
    }

    protected function postView() {
        return view(
            'blog.show',
            array_merge(
                $this->webLayoutViewParams(),
                [
                    'post' => $this->blogPost,
                    'breadcrumbs' => getBreadcrumb(['home', 'blog', $this->blogPost->title]),
                    'related' => $this->blogPost->related_posts
                ])
        );
    }

    public function getSeoConfiguration(): SeoConfiguration
    {
        return $this->blogPostRepository->seoConfiguration($this->blogPost->slug, Route::currentRouteName());
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
