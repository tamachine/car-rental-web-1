<?php
 
namespace App\View\Composers;
 
use Illuminate\View\View;
use App\Services\SelectableFull\AllSelectables;
use App\Helpers\CarsFilters;

class CarSelectablesComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $transmissionsSelectableFull;
    protected $roadsSelectableFull;
    protected $seatsSelectableFull;
    protected $enginesSelectableFull;
 
    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct(AllSelectables $allSelectables)
    {
        $this->transmissionsSelectableFull = $allSelectables->getInstance(CarsFilters::getTransmissionsInstance());
        $this->roadsSelectableFull = $allSelectables->getInstance(CarsFilters::getRoadsInstance());
        $this->seatsSelectableFull = $allSelectables->getInstance(CarsFilters::getSeatsInstance());
        $this->enginesSelectableFull = $allSelectables->getInstance(CarsFilters::getEnginesInstance());
    }
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {        
        $view->with('transmissionsSelectableFull', $this->transmissionsSelectableFull);
        $view->with('roadsSelectableFull', $this->roadsSelectableFull);
        $view->with('seatsSelectableFull', $this->seatsSelectableFull);
        $view->with('enginesSelectableFull', $this->enginesSelectableFull);        
    }
}