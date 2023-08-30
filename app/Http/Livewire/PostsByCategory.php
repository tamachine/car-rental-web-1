<?php

namespace App\Http\Livewire;

use App\Interfaces\BlogCategoryRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\Paginator;

class PostsByCategory extends Component
{
    use WithPagination;

    const CATEGORIES_PER_PAGE = 2;

    protected $blogCategoryRepository;

    protected $categories;

    public function render(Paginator $paginator, BlogCategoryRepositoryInterface $blogCategoryRepository)
    {        
        $paginatedCategories = $paginator->paginate($blogCategoryRepository->all(), $this->page-1, SELF::CATEGORIES_PER_PAGE);

        return view('livewire.posts-by-category', [
            'categoriesWithPosts' => $paginatedCategories,
        ]);
    }
}