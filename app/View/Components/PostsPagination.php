<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\BlogPost;

class PostsPagination extends Component
{
    /**
     * The post to show
     *
     * @var App\Models\BlogPost
     */
    public $blogPost;

    /**
     * The side where it will be shown
     *
     * @var string
     */
    public $side; //left or right

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(BlogPost $blogPost, $side)
    {
        $this->blogPost = $blogPost;
        $this->side = $side;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.posts-pagination', ['text' => $this->side == 'left' ? 'Previous article' : 'Next article']);
    }
}
