<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChooseInsurance extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $buttonClass;

    /**
     * @var string (json string)
     */
    public $insurance;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount($buttonClass, $insurance)
    {
        $this->buttonClass = $buttonClass;
        $this->insurance   = $insurance;
    }

    public function selectInsurance()
    {
        $sessionData = request()->session()->get('booking_data');

        $sessionData['insurances'][] = [
            'id'        => json_decode($this->insurance)->hashid,
            'name'      => json_decode($this->insurance)->name,
            'caren_id'  => json_decode($this->insurance)->caren_id,
            'hashid'    => json_decode($this->insurance)->hashid,
            'price'     => json_decode($this->insurance)->price * bookingDays()
        ];
        request()->session()->put('booking_data', $sessionData);

        return redirect()->route('extras', $sessionData['car']);
    }

    public function render()
    {
        return view('livewire.choose-insurance');
    }
}
