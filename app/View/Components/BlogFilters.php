<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BlogFilters extends Component
{
    public array $tags;

    public $activeTagHashid;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tags, $activeTagHashid = null)
    {
        $this->tags = $tags;
        $this->activeTagHashid = $activeTagHashid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog-filters');
    }
}
