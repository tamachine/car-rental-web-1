<?php

namespace App\View\Components;

use Illuminate\View\Component;
use \App\Interfaces\LocationRepositoryInterface;

class Locations extends Component
{
    /**
     * The current locations     
     * @var string     
     */
    public $locations;

    public $returnLayerId;

    public $title;

    public $type; //pickup or dropoff

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $returnLayerId = null, $title = null)
    {
        $locationRepository = app(LocationRepositoryInterface::class);     
        
        $this->locations = $locationRepository->all();     
        $this->type = in_array($type, ['pickup', 'dropoff']) ? $type : 'pickup';
        $this->returnLayerId = $returnLayerId;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view(
            'components.locations-selector.locations', 
            [
                'layerId' => $this->returnLayerId ? " id = ". $this->returnLayerId : '', 
                'locationInputInfoAttribute' => $this->type.'_input_info'
            ]
        );
    }
}
