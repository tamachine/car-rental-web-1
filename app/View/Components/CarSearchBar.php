<?php

namespace App\View\Components;

use Illuminate\View\Component;
use \App\Interfaces\LocationRepositoryInterface;
use Illuminate\Support\Arr;

class CarSearchBar extends Component
{

    /**
     * The current locations     
     * @var string     
     */
    public $locations;

     /**
     * The current locations     
     * @var string     
     */
    public $locationsIds;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(LocationRepositoryInterface $locationRepository)
    {
        $this->locations = $locationRepository->all();     
                
        $this->locationsIds = json_encode(Arr::pluck($this->locations, 'name', 'hashid'));        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view(
            'components.car-search-bar.car-search-bar', 
            [
                'ranges' => ['start', 'end'],                 
            ]
        );
    }
}