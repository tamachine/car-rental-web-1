<?php

namespace App\Http\Livewire;

use App\Interfaces\BlogPostRepositoryInterface;
use App\Interfaces\BlogTagRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Traits\Livewire\BlogSearchTrait;
use App\Models\BlogTag;

class BlogSearchTop10 extends Component
{
    use WithPagination;

    use BlogSearchTrait {
        search as protected searchFromBlogSearchTrait;
    }

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
     * Returns the query search for the post that has to be shown
     */
    protected function search() {        
        $blogPostRepository = app(BlogPostRepositoryInterface::class);            
            
        return $blogPostRepository->top($this->search, $this->tagHashid);
    }

    /**
     * Returns the subtitle for the page
     */
    protected function getSubtitle(): string {
        return $this->getBlogTagObject()?->name ?? __('blog-search.top10-subtitle');
    }

     /**
     * Returns the last text item for the breadcrumb
     */
    protected function getBreadcrumb(): string {
        return __('blog-search.top10-breadcrumb'); 
    }

    /**
     * Returns the title for the page
     */
    protected function getTitle(): string {
        return __('blog-search.top10-title'); 
    }   
}

