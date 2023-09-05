<?php

namespace App\Http\Livewire;

use App\Interfaces\BlogTagRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Traits\Livewire\BlogSearchTrait;

class BlogSearchString extends Component
{
    use WithPagination;

    use BlogSearchTrait {
        getSubtitle as protected getSubtitleFromBlogSearchTrait;
    }

    protected $queryString = ['search', 'tag'];   

    public $tag;

    public function mount(Request $request, BlogTagRepositoryInterface $blogTagRepository) {
        $this->search = $request->input('search');                                                      
        
        if($request->input('tag')) {
            $this->tag = $request->input('tag');
            $this->tagHashid = $blogTagRepository->like('slug', $this->tag)->first()?->hashid;
        }
    }      

    /**
     * Returns the subtitle for the page
     */
    protected function getSubtitle(): string {
        $blogTagRespository = app(BlogTagRepositoryInterface::class);            
            
        return $blogTagRespository->findByHashid($this->tagHashid)?->name ?? $this->getSubtitleFromBlogSearchTrait();
    }
}

