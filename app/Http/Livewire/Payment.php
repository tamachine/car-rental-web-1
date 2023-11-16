<?php

namespace App\Http\Livewire;

use App\Interfaces\BookingRepositoryInterface;
use App\Interfaces\CarRepositoryInterface;
use Illuminate\Support\Arr;
use App\Traits\Livewire\SummaryTrait;
use Livewire\Component;

class Payment extends Component
{
    use SummaryTrait;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $first_name = "";

    /**
     * @var string
     */
    public $last_name = "";

    /**
     * @var string
     */
    public $email = "";

    /**
     * @var string
     */
    public $email_confirmation = "";

    /**
     * @var string
     */
    public $telephone = "";

    /**
     * @var string
     */
    public $address = "";

    /**
     * @var string
     */
    public $postal_code = "";

    /**
     * @var string
     */
    public $city = "";

    /**
     * @var string
     */
    public $country = "";

    /**
     * @var string
     */
    public $additional = "";

    /**
     * @var bool
     */
    public $agree = false;

    /**
     * @var int
     */
    public $number_passengers = 0;    

    /**
     * @var string|null
     */
    public $bookingHashid = null;

    public $adultPassengers;

    protected $listeners = ['update_number' => 'updateNumberPassengers'];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(CarRepositoryInterface $carRepository)
    {        
        $sessionData = request()->session()->get('booking_data');

        $this->car = $carRepository->findByHashid($sessionData['car'])->toJson();
        $this->carHashid = $this->getCarObject()->hashid;

        $this->adultPassengers = $this->getCarObject()->adult_passengers;
        
        if($this->getCarObject()->featured_image) {
            $this->mainImage = $this->getCarObject()->getFeaturedImageModelImageInstance?->url;
        } else {
            $this->mainImage = asset('images/cars/default-car.jpg');
        }

        $this->pickupLocation = bookingPickupLocation();
        $this->dropoffLocation = bookingDropoffLocation();
        $this->insurances = bookingInsurances();

        $this->includedExtras = collect($carRepository->extras($this->getCarObject()->hashid))->where('included', 1)->map(function ($item) {
            return $item->toArray(); //convert App\Models\CarExtra into array for livewire blade
        });;
        
        $this->chosenExtras = $sessionData["extras"];

        $this->percentage = $this->getCarObject()->booking_percentage;
        $this->calculateTotal();
    }

    public function render()
    {
        return view('livewire.payment');
    }

    public function updateNumberPassengers($number)
    {
        $this->number_passengers = $number;
    }

    public function continue()
    {
        $this->dispatchBrowserEvent('validationError');

        $rules = [
            'first_name'        => 'required',
            'last_name'         => 'required',
            'email'             => 'required| email| confirmed',
            'telephone'         => 'required',
            'address'           => 'required',
            'postal_code'       => 'required',
            'city'              => 'required',
            'country'           => 'required',
            'number_passengers' => 'required | numeric | min:1 | max:12',
            'agree'             => 'accepted'
        ];

        $this->validate($rules);

        $booking = $this->saveBooking();

        $this->bookingHashid = $booking->hashid;

        $this->generateValitorForm = true;
    }

    private function saveBooking()
    {
        $sessionData = request()->session()->get('booking_data');

        // Check if we have an affiliate in session
        $affiliateHashid = null;

        if (request()->session()->has('affiliate')) {
            $affiliateHashid = request()->session()->get('affiliate');
        }    

        $booking =  
            app(BookingRepositoryInterface::class)->create(
                $this->carHashid, 

                [
                    'from' => $sessionData["from"]->format('Y-m-d H:i:s'), 
                    'to'   => $sessionData["to"]->format('Y-m-d H:i:s')
                ],

                [
                    'pickup'  => $sessionData["pickup_hashid"], 
                    'dropoff' => $sessionData["dropoff_hashid"]
                ],     

                count($sessionData["insurances"])
                ? array_column($sessionData["insurances"], 'hashid')
                : [],

                count($sessionData["extras"])
                ? Arr::pluck($sessionData['extras'], 'quantity', 'hashid')
                : [],

                [
                    'first_name' => $this->first_name,
                    'last_name' => $this->last_name,
                    'email' => $this->email,
                    'telephone' => $this->telephone,
                    'address' => $this->address,
                    'postal_code' => $this->postal_code,
                    'city' => $this->city,
                    'country' => $this->country,
                    'number_passengers' => $this->number_passengers,
                    'additional_info' => $this->additional
                ],

                $affiliateHashid ?? null,
            );       

        $sessionData['booking'] = $booking->hashid;

        request()->session()->put('booking_data', $sessionData);

        return $booking;
    }    
}
