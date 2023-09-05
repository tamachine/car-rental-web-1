<?php

namespace App\Http\Livewire;

use App\Interfaces\BlogTagRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Traits\Livewire\BlogSearchTrait;
use App\Models\BlogTag;

class BlogSearchAll extends Component
{
    use WithPagination, BlogSearchTrait;

    protected $queryString = ['search', 'tag'];

    public $tag;    

    public ?string $blogTag = null;

    public function mount(Request $request, BlogTagRepositoryInterface $blogTagRepository) {
        $this->search = $request->input('search');                                                      
        
        if($request->input('tag')) {
            $this->tag = $request->input('tag');
            $this->blogTag = $blogTagRepository->findBySlug($this->tag)->toJson(); // convert to json to be able to have it as public property and get access from another request                                          
            $this->tagHashid = $this->getBlogTagObject()?->hashid;
        }
    }      

    /**
     * Returns the BlogTag instance retrieving it from the public string property
     * @return BlogTag|null 
     */
    protected function getBlogTagObject(): object|null {        
        return json_decode($this->blogTag);
    }

    /**
     * Returns the subtitle for the page
     */
    protected function getSubtitle(): string {
        return  $this->getBlogTagObject()?->name ?? __('blog-search.all-subtitle');
    }

     /**
     * Returns the last text item for the breadcrumb
     */
    protected function getBreadcrumb(): string {
        return __('blog-search.all-breadcrumb'); 
    }

    /**
     * Returns the title for the page
     */
    protected function getTitle(): string {
        return __('blog-search.all-title'); 
    }   
}

