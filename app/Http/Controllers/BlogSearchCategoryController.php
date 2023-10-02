<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\BlogCategoryRepositoryInterface;
use App\Interfaces\ExtendsWebLayoutInterface;
use App\Models\BlogCategory;
use App\Models\SeoConfiguration;
use App\Traits\Nave\ExtendsWebLayout;
use Illuminate\Support\Facades\Route;

class BlogSearchCategoryController extends Controller implements ExtendsWebLayoutInterface
{
    use ExtendsWebLayout;

    protected BlogCategoryRepositoryInterface $blogCategoryRepository;

    protected BlogCategory|null $blogCategory;

    public function __construct(BlogCategoryRepositoryInterface $blogCategoryRepository)
    {
        $this->blogCategoryRepository = $blogCategoryRepository;
    }

    public function index(BlogCategory $blogCategory)
    {
        $this->blogCategory = $blogCategory;

        return view('blog.search.category', array_merge(['category' => $this->blogCategory], $this->webLayoutViewParams()));
    }

    public function getSeoConfiguration(): SeoConfiguration
    {
        return $this->blogCategoryRepository->seoConfiguration($this->blogCategory->slug, Route::currentRouteName());
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
