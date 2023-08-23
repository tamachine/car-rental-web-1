<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HeadingH2 extends Component
{
    /**
     * The icon path.
     *
     * @var string
     */
    public $title;

    /**
     * The text.
     *
     * @var string
     */
    public $subtitle;

    /**
     * The text direction.
     *
     * @var string
     */
    public $textDirection;

    /**
     * The padding between items.
     *
     * @var string
     */
    public $paddingTop;

    /**
     * for mobile: h2 font size: 42px h4 font size: 18px
     */
    public $mobileSmall;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $subtitle, $textDirection = 'center', $paddingTop = '5', $mobileSmall = false)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->textDirection = $textDirection;
        $this->paddingTop = $paddingTop;
        $this->mobileSmall = $mobileSmall;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.heading-h2');
    }
}
