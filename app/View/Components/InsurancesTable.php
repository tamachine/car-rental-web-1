<?php

namespace App\View\Components;

use App\Interfaces\InsuranceFeatureRepositoryInterface;
use Illuminate\View\Component;

class InsurancesTable extends Component
{
    public $insurances;

    public $features;

    public $isLanding = false;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(InsuranceFeatureRepositoryInterface $insuranceFeatureRepository, array $insurances, bool $isLanding = false)
    {        
        $this->insurances = $insurances;

        $this->features   = $insuranceFeatureRepository->all();

        $this->isLanding  = $isLanding;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.insurances-table');
    }
}
