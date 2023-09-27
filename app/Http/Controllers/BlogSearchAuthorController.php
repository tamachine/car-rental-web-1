<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\BlogAuthorRepositoryInterface;
use App\Interfaces\ExtendsWebLayoutInterface;
use App\Models\BlogAuthor;
use App\Models\SeoConfiguration;
use App\Traits\Nave\ExtendsWebLayout;
use Illuminate\Support\Facades\Route;

class BlogSearchAuthorController extends Controller implements ExtendsWebLayoutInterface
{
    use ExtendsWebLayout;

    protected $blogAuthorRepository;

    protected BlogAuthor|null $blogAuthor;

    public function __construct(BlogAuthorRepositoryInterface $blogAuthorRepository) {
        $this->blogAuthorRepository = $blogAuthorRepository;
    }

    public function index($blog_author_slug)
    {
        $this->blogAuthor = $this->findOrfail($this->blogAuthorRepository->findBySlug($blog_author_slug));
        //$this->blogAuthor = $blog_author;

        return view('blog.search.author', array_merge(['author' => $this->blogAuthor], $this->webLayoutViewParams()));
    }

    public function getSeoConfiguration(): SeoConfiguration
    {
        return $this->blogAuthorRepository->seoConfiguration($this->blogAuthor->slug, Route::currentRouteName());
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
