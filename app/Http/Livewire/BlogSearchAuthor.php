<?php

namespace App\Http\Livewire;

use App\Interfaces\BlogAuthorRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Traits\Livewire\BlogSearchTrait;
use App\Repositories\Nave\BlogAuthorRepository;

class BlogSearchAuthor extends Component
{
    use WithPagination;

    use BlogSearchTrait {
        search as protected searchFromBlogSearchTrait;
    }

    protected $queryString = ['search'];   

    public string $blogAuthor;

    public function mount(String $blogAuthorSlug, Request $request, BlogAuthorRepositoryInterface $blogAuthorRepository) {
        $this->search       = $request->input('search');          
        $this->blogAuthor   = $blogAuthorRepository->findBySlug($blogAuthorSlug)->toJson();  // convert to json to be able to have it as public property and get access from another request                                          
    }

    /**
     * Returns the blogAuthor instance retrieving it from the public string property
     * @return BlogAuthor 
     */
    protected function getBlogAuthorObject(): object { 
        return json_decode($this->blogAuthor);
    }
       
     /**
     * Returns the query search for the post that has to be shown
     */
    protected function search() {      
        $blogAuthorRepository = app(BlogAuthorRepositoryInterface::class);            
              
        return $blogAuthorRepository->posts($this->getBlogAuthorObject()->hashid, $this->search, $this->tagHashid); 
    }

    /**
     * Returns the last text item for the breadcrumb
     */
    protected function getBreadcrumb(): string {
        return $this->getBlogAuthorObject()->name; 
    }

    /**
     * Returns the title for the page
     */
    protected function getTitle(): string {
        return $this->getBlogAuthorObject()->name; 
    }

    /**
     * Returns the subtitle for the page
     */
    protected function getSubtitle(): string {
        return $this->getBlogAuthorObject()->short_bio ?? '';  
    }
}

