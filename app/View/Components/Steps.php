<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Car;

class Steps extends Component
{
    public $active;

    public $mobile;

    protected $steps;

    protected Car $car;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Car $car, $active = null, $mobile = false)
    {        
        $this->active = $active;
        $this->mobile = $mobile;
        $this->car = $car;

        $this->setSteps();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.steps', ['steps' => $this->steps]);
    }

    protected function setSteps() {
        if ($this->mobile) {
            $this->steps = [
                1 => $this->getStep('insurances'), 
                2 => $this->getStep('extras'), 
                3 => $this->getStep('summary'), 
                4 => $this->getStep('personal-details')
            ];
        } else {
            $this->steps = [
                1 => $this->getStep('insurances'), 
                2 => $this->getStep('extras'), 
                3 => $this->getStep('personal-details')
            ];
        }
    }

    protected function getStep($step) {

        $steps = [

            'insurances' => [
                'text' => trans('steps.insurances'), 
                'url'  => route('insurances', $this->car->hashid)
            ],

            'extras' => [
                'text' => trans('steps.extras'), 
                'url'  => route('extras', $this->car->hashid)
            ],

            'summary' => [
                'text' => trans('steps.summary'), 
                'url'  => route('extras', ['car_hashid' => $this->car->hashid, 'showSummary' => true])
            ],

            'personal-details' => [
                'text' => trans('steps.personal-details'), 
                'url'  => route('payment', $this->car->hashid)
            ],
        ];

        return $steps[$step];
    }
}
