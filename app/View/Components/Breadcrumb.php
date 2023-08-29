<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
     /**
     * The breadcrumbs array.
     *
     * @var string
     */
    public $breadcrumbs;

     /**
     * The breadcrumbs array.
     *
     * @var boolean
     */
    public $lightColors;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $breadcrumbs, $lightColors = false)
    {
        $this->breadcrumbs = $breadcrumbs;
        $this->lightColors = $lightColors;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcrumb');
    }
}
