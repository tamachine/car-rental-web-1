<?php

namespace App\View\Components;

use App\Interfaces\BookingRepositoryInterface;
use App\Interfaces\ValitorRepositoryInterface;
use Illuminate\View\Component;


class ValitorForm extends Component
{    
    public $params;

    public string $formAction;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $bookingHashid, ValitorRepositoryInterface $valitorRepository, BookingRepositoryInterface $bookingRepository)
    {
        $valitor = $valitorRepository->params($bookingHashid);

        $this->params     = $valitor->params;
        $this->formAction = $valitor->form_action;
        
        $bookingRepository->update($bookingHashid, ['valitor_request' => $this->params->toArray()]);        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.valitor-form');
    }
}
