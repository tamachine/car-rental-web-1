<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Cache;
use App\Helpers\Cache as CacheHelper;
use App\Interfaces\CarCategoryRepositoryInterface;

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
        return Cache::store(CacheHelper::API_STORE)->remember('car-categories', CacheHelper::DEFAULT_TIME ,function () {    
            $carCategoryRepository = app(CarCategoryRepositoryInterface::class);                 

            return $carCategoryRepository->all();

        });
    }
}
