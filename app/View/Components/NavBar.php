<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Interfaces\CarFiltersRepositoryInterface;

class NavBar extends Component
{

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {                
        return view('components.nav-bar', ['carCategories' => $this->carCategories()]);
    }

    protected function carCategories() {        
        $carFiltersRepository = app(CarFiltersRepositoryInterface::class);                 

        return $carFiltersRepository->types();
    }
}
