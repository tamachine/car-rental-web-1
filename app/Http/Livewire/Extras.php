<?php

namespace App\Http\Livewire;

use App\Interfaces\CarRepositoryInterface;
use App\Models\Car;
use App\Traits\Livewire\SummaryTrait;
use Livewire\Component;

class Extras extends Component
{
    use SummaryTrait;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */   

    /**
     * @var object
     */
    public $extras;

     /**
     * @var object
     */
    public $allExtras;

    /**
     * @var bool
     */
    public $showMoreButton;

    /**
     * @var object
     */
    public $extraPopup;

    /**
     * @var boolean
     * 
     */
    public $showSummary = false;

    /**
     * @var int
     */
    protected $take = 4;   

    protected $listeners = ['update_number' => 'clickUnitExtra'];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(Car $car, CarRepositoryInterface $carRepository)
    {        
        $this->car = $car->toJson();
        $this->carHashid = $car->hashid;
        $this->carName = $car->name;    

        $this->setChosenExtrasFromSession();        

        $this->allExtras = collect($carRepository->extras($this->getCarObject()->hashid))->map(function ($item) {

            $this->unitsExtras[$item->hashid] = 0;

            $item->selected = (in_array($item->hashid, array_keys($this->chosenExtras)));
            
            return $item->toArray(); //convert App\Models\CarExtra into array for livewire blade
        });

        $this->setUnitsExtrasFromSession();        

        $this->extras = $this->allExtras->take($this->take);

        $this->setShowMoreButton();
        
        if($this->getCarObject()->featured_image) {
            $this->mainImage = $this->getCarObject()->getFeaturedImageModelImageInstance->url;
        } 

        $this->pickupLocation = bookingPickupLocation();
        $this->dropoffLocation = bookingDropoffLocation();
        $this->insurances = bookingInsurances();
        $this->includedExtras = collect($carRepository->extras($this->getCarObject()->hashid))->where('included', 1)->map(function ($item) {
            return $item->toArray(); //convert App\Models\CarExtra into array for livewire blade
        });;

        $this->percentage = $this->getCarObject()->vendor->caren_settings->online_percentage;
        $this->calculateTotal();

        $this->showSummary = (null !== request()->query('showSummary')) ? request()->query('showSummary') : false;

    }

    public function render()
    {                        
        return view('livewire.extras', ['car' => $this->getCarObject()]);
    }

    public function clickUnitExtra($units, $hashid) {            
        
        $this->unitsExtras[$hashid] = $units;

        $this->setExtra($hashid, $units);

        $this->saveExtrasInSession();

        $this->calculateTotal();

        $this->dispatchBrowserEvent('stopLoading', ['spinnerId' => 'clickUnitExtra-spinner']);
    }

    public function toggleExtra($hashid)
    {
        if (isset($this->chosenExtras[$hashid])) {
            unset($this->chosenExtras[$hashid]);
        } else {     
            $this->setExtra($hashid, 1);
        }

        $this->saveExtrasInSession();

        $this->calculateTotal();
    }

    public function more()
    {
        $this->extras = $this->allExtras;        
        
        $this->setShowMoreButton();       
    }

    public function info(string $extraHashid)
    {
        $this->extraPopup = app(CarRepositoryInterface::class)->findCarExtraByHashid($this->getCarObject()->hashid, $extraHashid)->toArray();        
    }

    protected function setShowMoreButton()
    {
        $this->showMoreButton = ($this->extras->count() < $this->allExtras->count());
    }

    public function continue()
    {        
        return redirect()->route('payment');
    }

    protected function saveExtrasInSession() {
        $sessionData = request()->session()->get('booking_data');

        $sessionData['extras'] = $this->chosenExtras;

        request()->session()->put('booking_data', $sessionData);
    }

    protected function setChosenExtrasFromSession() {
        $sessionData = request()->session()->get('booking_data');

        if(isset($sessionData['extras'])) $this->chosenExtras = $sessionData['extras'];        
    }

    protected function setUnitsExtrasFromSession() {
        $sessionData = request()->session()->get('booking_data');

        if(isset($sessionData['extras'])) {
            foreach($sessionData['extras'] as $extra) {
                $this->unitsExtras[$extra['hashid']] = $extra['quantity'];
            }
        }
    }

    protected function setExtra($hashid, $units) {
        $extra = app(CarRepositoryInterface::class)->findCarExtraByHashid($this->getCarObject()->hashid, $hashid);
            
        $price = $extra->price_mode == 'per_day'
            ? $extra->price * bookingDays()
            : $extra->price;

        $this->chosenExtras[$extra->hashid] = [
            'name'      => $extra->name,
            'caren_id'  => $extra->caren_id,
            'price'     => $price * $units,
            'quantity'  => $units,
            'hashid'    => $extra->hashid,
        ];

        if($units == 0) unset($this->chosenExtras[$extra->hashid]);
    }
}
