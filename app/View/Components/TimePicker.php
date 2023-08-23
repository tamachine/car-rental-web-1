<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TimePicker extends Component
{    

    public $inputElementSelector; //the input element selector which is related to the time picker in order to show the value selected

    public $text;

    public $urlElementParam; //the url param which defines the default time

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(String $inputElementSelector = '', String $text = '', String $urlElementParam = '')
    {       
        $this->inputElementSelector = $inputElementSelector;
        $this->text  = $text;
        $this->urlElementParam = $urlElementParam;
    }
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {        
        return view('components.time-picker');
    }    
}