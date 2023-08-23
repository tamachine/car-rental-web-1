<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardDefault extends Component
{
    /**
     * The image path.
     *
     * @var string
     */
    public $imagePath;

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
    public function __construct($imagePath, $title, $text)
    {
        $this->imagePath = $imagePath;
        $this->title = $title;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-default');
    }
}
