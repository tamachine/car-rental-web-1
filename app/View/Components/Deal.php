<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Deal extends Component
{

    /**
     * The icon path.
     *
     * @var string
     */
    public $iconPath;

     /**
     * The title
     *
     * @var string
     */
    public $title;

    /**
     * The text
     *
     * @var string
     */
    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $text, $iconPath)
    {
        $this->title = $title;
        $this->text = $text;
        $this->iconPath = $iconPath;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.deal');
    }
}
