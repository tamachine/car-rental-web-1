<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;
use App\Models\BlogTag as model;
use Illuminate\Support\Facades\Route;

class BlogTag extends Component
{
     /**
     * The breadcrumbs array.
     *
     * @var collection
     */
    public $blogTag;

    /**
     * active tag
     *
     * @var string
     */
    public $active;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(model $blogTag, $active = false)
    {
        $this->blogTag = $blogTag;
        $this->active  = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog-tag', ['onclick' => $this->onclick()]);
    }

    protected function onClick() {
        if(Route::currentRouteName() == 'blog') {            
            return "window.location.href='". route('blog.search.string') ."?tag=".$this->blogTag->slug."'";            
        } else {
            return "javascript:boud(0)";
        }
    }
}
