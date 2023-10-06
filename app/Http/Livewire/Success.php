<?php

namespace App\Http\Livewire;

use App\Interfaces\BookingRepositoryInterface;
use App\Interfaces\CarRepositoryInterface;
use App\Models\Booking;
use App\Models\Car;
use App\Traits\Livewire\SummaryTrait;
use Livewire\Component;

class Success extends Component
{
    use SummaryTrait;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Booking
     */
    public $booking;

    /**
     * @var string
     */
    public $bookingPickupDate = "";

    /**
     * @var string
     */
    public $bookingDropoffDate = "";

    /**
     * @var array
     */
    public $personalInfo = [];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        $sessionData = request()->session()->get('booking_data');

        $this->car = app(CarRepositoryInterface::class)->findByhashid($sessionData['car']);
        $this->booking = app(BookingRepositoryInterface::class)->findByhashid($sessionData['booking']);

        if($this->car->featured_image) {
            $this->mainImage = $this->car->featured_image_url;
        } else {
            $this->mainImage = asset('images/cars/default-car.jpg');
        }

        $this->bookingPickupDate = $sessionData['from']->isoFormat("MMMM D, Y");
        $this->bookingDropoffDate = $sessionData['to']->isoFormat("MMMM D, Y");
        $this->pickupLocation = bookingPickupLocation();
        $this->dropoffLocation = bookingDropoffLocation();
        $this->insurances = bookingInsurances();
        $this->includedExtras = $this->car->extraList()->where('included', 1);
        $this->chosenExtras = $sessionData["extras"];

        $this->percentage = $this->car->vendor->caren_settings["online_percentage"];
        $this->calculateTotal();

        $this->setPersonalInfo();

        // Remove the session
        request()->session()->forget('booking_data');
    }

    protected function setPersonalInfo()
    {
       $this->personalInfo = [
            'card_number'   => request()->CardNumberMasked,
            'card_type'     => request()->CardType
        ];
    }

    public function render()
    {
        return view('livewire.success');
    }
}
