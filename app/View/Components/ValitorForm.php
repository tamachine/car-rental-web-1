<?php

namespace App\View\Components;

use App\Interfaces\BookingRepositoryInterface;
use App\Interfaces\PaymentRepositoryInterface;
use Illuminate\View\Component;
use App\Models\Booking;

class ValitorForm extends Component
{    
    public $params;

    public string $formAction;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $bookingHashid, PaymentRepositoryInterface $paymentRepository, BookingRepositoryInterface $bookingRepository)
    {
        $valitor = $paymentRepository->valitor($bookingHashid);

        $this->params     = $valitor->params;
        $this->formAction = $valitor->form_action;
        
        $bookingRepository->update($bookingHashid, $this->params->toArray());        
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
