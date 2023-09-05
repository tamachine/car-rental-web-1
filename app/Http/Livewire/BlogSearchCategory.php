<?php

namespace App\Http\Livewire;

use App\Interfaces\BlogCategoryRepositoryInterface;
use Livewire\Component;
use App\Models\BlogPost;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Traits\Livewire\BlogSearchTrait;

class BlogSearchCategory extends Component
{
    use WithPagination;

    use BlogSearchTrait {
        search as protected searchFromBlogSearchTrait;
    }

    protected $queryString = ['search'];

    public string $blogCategory;

    public function mount(String $blogCategorySlug, Request $request, BlogCategoryRepositoryInterface $blogCategoryRepository) {
        $this->search       = $request->input('search');          
        $this->blogCategory = $blogCategoryRepository->findBySlug($blogCategorySlug)->toJson();  // convert to json to be able to have it as public property and get access from another request                                          
    }
    
    /**
     * Returns the blogCategory instance retrieving it from the public string property
     * @return BlogCategory 
     */
    protected function getBlogCategoryObject(): object { 
        return json_decode($this->blogCategory);
    }

     /**
     * Returns the query search for the posts that have to be shown
     */
    protected function search() {      
        $blogCategoryRepository = app(BlogCategoryRepositoryInterface::class);            
              
        return $blogCategoryRepository->posts($this->getBlogCategoryObject()->hashid, $this->search, $this->tagHashid); 
    }

     /**
     * Returns the last text item for the breadcrumb
     */
    protected function getBreadcrumb(): string {
        return $this->getBlogCategoryObject()->name; 
    }

    /**
     * Returns the title for the page
     */
    protected function getTitle(): string {
        return $this->getBlogCategoryObject()->name; 
    }    
}

