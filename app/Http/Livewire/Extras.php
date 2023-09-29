<?php

namespace App\Http\Livewire;

use App\Interfaces\CarRepositoryInterface;
use App\Interfaces\ExtraRepositoryInterface;
use App\Models\Car;
use App\Models\CarExtra;
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
        $this->allExtras = collect($carRepository->extras($this->getCarObject()->hashid))->map(function ($item) {
            return $item->toArray(); //convert App\Models\CarExtra into array for livewire blade
        });;;
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

    public function toggleExtra($hashid)
    {
        if (isset($this->chosenExtras[$hashid])) {
            unset($this->chosenExtras[$hashid]);
        } else {     
            $extra = app(CarRepositoryInterface::class)->findCarExtraByHashid($this->getCarObject()->hashid, $hashid);
            
            $price = $extra->price_mode == 'per_day'
                ? $extra->price * bookingDays()
                : $extra->price;

            $this->chosenExtras[$extra->hashid] = [
                'name'      => $extra->name,
                'caren_id'  => $extra->caren_id,
                'price'     => $price,
                'quantity'  => 1,
                'hashid'    => $extra->hashid,
            ];
        }

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

    
}
