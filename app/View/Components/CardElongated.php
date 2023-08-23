<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardElongated extends Component
{
     /**
     * The image path.
     *
     * @var string
     */
    public $backgroundRelativePath;

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
     * The text to use to show after the clock icon
     *
     * @var string
     */
    public $textForTime;

    /**
     * The image hover path
     *
     * @var string
     */
    public $backgroundHoverRelativePath;

    /**
     * The href to apply to the component
     *
     * @var string
     */
    public $href;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($backgroundRelativePath, $title, $text, $textForTime, $backgroundHoverRelativePath = null, $href = null)
    {
        $this->backgroundRelativePath = $backgroundRelativePath;
        $this->backgroundHoverRelativePath = $backgroundHoverRelativePath;
        $this->title = $title;
        $this->text = $text;
        $this->textForTime = $textForTime;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view(
            'components.card-elongated', 
            [
                'hover' => $this->backgroundHoverRelativePath ?? $this->backgroundRelativePath ,
                'image' => $this->backgroundRelativePath 
            ]
        );
    }
}
