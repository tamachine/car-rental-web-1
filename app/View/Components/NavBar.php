<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Interfaces\CarFiltersRepositoryInterface;
use App\Services\Selectable\CarNavbarSelectableComponent;
use App\Services\SelectableFull\CarNavbarSelectableFullComponent;

class NavBar extends Component
{

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {                
        return view('components.nav-bar', 
            [
                'carCategories' => $this->carCategories(), 
                'carsSelectableClass' => app(CarNavbarSelectableFullComponent::class),                
            ]
        );
    }

    protected function carCategories() {        
        $carFiltersRepository = app(CarFiltersRepositoryInterface::class);                 

        $allTypes = $carFiltersRepository->types();

        return collect($allTypes)->filter(function ($item) {
            return (in_array($item->id, ['medium', 'large', 'premium', 'minivans']));
        });

        $categories = [];
        foreach($allTypes as $type) {

        }
    }
}
