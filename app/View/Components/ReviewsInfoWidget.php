<?php

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * for now, we are going to use a widget to show reviews (elfsight). 
 * When using the google api, ReviewsInfo component must be used
 * To customize the css, we are using the schema created by the plugin (by js) in order to get the data
 * */
class ReviewsInfoWidget extends Component
{
    public $tokenClass;

    protected $config;

    public string $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(String $type)
    {
        $this->type = $type;

        $this->config = config('elfsight');
        
        if(isset($this->config[$this->type])) {
            $this->tokenClass = $this->config[$this->type];        
        }        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.reviews-info-widget');
    }
}
