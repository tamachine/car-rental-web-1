<?php

namespace App\Traits\Livewire;

use App\Interfaces\BlogPostRepositoryInterface;
use App\Interfaces\BlogTagRepositoryInterface;
use App\Services\Paginator;
use Livewire\WithPagination;

trait BlogSearchTrait
{
    use WithPagination;

    /**
     * @var string
     */
    public $search;
   
     /**
     * @var string
     */
    public $tagHashid = null;

     /**
     * @var string
     */
    public $title ='title';

     /**
     * @var string
     */
    public $subtitle = 'subtitle';

     /**
     * @var Collection
     */
    protected $posts;  
    
    /**
     * @var BlogPostRepositoryInterface
     */
    protected $blogPostRepository;

    /**
     * Method to be called in the view when the tag button is clicked
     */
    public function searchByTag($hashid, BlogTagRepositoryInterface $blogTagRepository) {        
        if($this->tagHashid == $hashid) {
            $this->tagHashid = null;
        } else {
            $this->tagHashid = $hashid;     
            $this->tag = $blogTagRepository->findByHashid($this->tagHashid)?->slug;                         
        }        
    }  

    /**
     * Returns the title for the page
     */
    protected function getTitle(): string {
        return $this->search == '' ? __('blog-search.search-title') : $this->search; 
    }

    /**
     * Returns the subtitle for the page
     */
    protected function getSubtitle(): string {
        return __('blog-search.category-subtitle'); 
    }

    /**
     * Returns the last text item for the breadcrumb
     */
    protected function getBreadcrumb(): string {
        return __('blog-search.breadcrumb'); 
    }

    /**
     * Returns the current url for the pagination. query params are not needed as the paginator will add them
     */
    protected function getUrlForPagination(): string {              
        return route('blog.search.string');
    }

    /**
     * Returns the query search for the post that has to be shown
     */
    protected function search() {        
        return $this->blogPostRepository->all($this->search, $this->tagHashid);
    }    

    /**
     * render the view for the filtered posts
     */
    public function render(BlogTagRepositoryInterface $blogTagRepository, Paginator $paginator, BlogPostRepositoryInterface $blogPostRepository)
    {
        $this->title    = $this->getTitle();  
        $this->subtitle = $this->getSubtitle();  
        $this->blogPostRepository = $blogPostRepository;
       
        return view(
            'livewire.blog-search-string', 
            [           
                'tags'        => $blogTagRepository->all(),
                'posts'       => $paginator->paginate($this->search(), $this->page-1, 6),        
                'breadcrumbs' => getBreadcrumb(['home', 'blog', $this->getBreadcrumb()]),   
                'urlForPagination'   => $this->getUrlForPagination()                        
            ]               
        );
    }
}

