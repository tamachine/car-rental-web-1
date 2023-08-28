<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Accordion extends Component
{

    /**
     * The question
     *
     * @var string
     */
    public $question;

     /**
     * The answer
     *
     * @var string
     */
    public $answer;

     /**
     * The classes for the question div
     *
     * @var string
     */
    public $smallText = false;

     /**
     * The font classes for the question div
     *
     * @var string
     */
    public $questionFontSizeClass = null;

    /**
     * The font classes for the answer div
     *
     * @var string
     */
    public $answerFontSizeClass = null;

    /**
     * The accordion group id. 
     * If groupId is set, then, when an accordion is open in the group, all other accordions will be closed.
     * If groupId is not set, then, when an accordion is open, all other accordions will remain the same.
     *
     * @var string
     */
    public $groupId = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($question, $answer, $questionFontSizeClass = null, $answerFontSizeClass = null, $groupId = null)
    {
        $this->question = $question;
        $this->answer = $answer;
        $this->questionFontSizeClass = $questionFontSizeClass;  
        $this->answerFontSizeClass = $answerFontSizeClass;    
        $this->groupId = $groupId;     
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.accordion');
    }
}

