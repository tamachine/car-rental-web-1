<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Feature extends Component
{
    /**
     * The text
     *
     * @var string
     */
    public $text;

    /**
     * The title
     *
     * @var string
     */
    public $title;

    /**
     * The image path
     *
     * @var string
     */
    public $imagePath;

    /**
     * The webp image path
     *
     * @var string
     */
    public $webpImagePath;

    /**
     * The flex direction on desktop.
     *
     * @var string
     */
    public $reversed;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $text, $imagePath, $webpImagePath = null, $reversed = false)
    {
        $this->title = $title;
        $this->text = $text;
        $this->imagePath = $imagePath;
        $this->webpImagePath = $webpImagePath;
        $this->reversed = $reversed;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.feature');
    }
}
