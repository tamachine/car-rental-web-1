<?php

namespace App\View\Components;

use Illuminate\View\Component;

class IconText extends Component
{

    /**
     * The icon path.
     *
     * @var string
     */
    public $iconPath;

    /**
     * The text.
     *
     * @var string
     */
    public $text;

    /**
     * Is it column or row?
     *
     * @var bool
     */
    public $isColumn;


    /**
     *
     * @var string
     */
    public $iconClasses;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($iconPath, $text, $isColumn = true, $iconClasses = "")
    {
        $this->iconPath = $iconPath;
        $this->text = $text;
        $this->isColumn = $isColumn;
        $this->iconClasses = $iconClasses;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.icon-text');
    }
}
