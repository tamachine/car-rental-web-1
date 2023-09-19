<?php

namespace App\Http\Livewire;

use App\Interfaces\CarFiltersRepositoryInterface;
use App\Interfaces\CarRepositoryInterface;
use Livewire\Component;
use App\Services\SelectableFull\AllSelectables;

class CarSearchResults extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    public $cars;

    public $categories = [];
    public $selectables= [];
    public $dates = [];
    public $locations = [];

    protected $allSelectables;
    protected $query;
    protected $carsSearcRepository;
    protected $carSearchObject;
    
    public $showFilters;    
    public $showImageIfLittleResults;
    public $widthFillScreen;
    public $isLanding;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function boot(AllSelectables $allSelectables, CarRepositoryInterface $carsSearcRepository) {
        $this->allSelectables = $allSelectables;
        $this->carsSearcRepository = $carsSearcRepository;
    }

    public function mount(bool $showFilters = true, bool $showImageIfLittleResults = false, bool $widthFillScreen = false, array $categories = [], array $dates = [], array $locations = [], bool $isLanding = false) {        
        $this->showFilters              = $showFilters;
        $this->showImageIfLittleResults = $showImageIfLittleResults;
        $this->widthFillScreen          = $widthFillScreen;
        $this->categories               = $categories;
        $this->dates                    = $dates;
        $this->locations                = $locations;
        $this->isLanding                = $isLanding;

        $this->carSearch();
        $this->setSelectables();
    }

    public function click($categoryId)
    {
        $this->setCategory($categoryId);
        $this->carSearch();
    }

     /**
     * @var array selectableFullComponent json (using jsonSerialize in SelectableFullAbstract)
     * @var array selectableFullItem json (using jsonSerialize in SelectableFullItem)
     */
    public function clickSelectable(array $selectableFullComponent, array $selectableFullItem)
    {
        $this->setSelectable($selectableFullComponent['instance'], $selectableFullItem['value']);
        $this->carSearch();
    }

    /**
     * @param   string  $hashid
     * @return  void
     */
    public function selectCar($hashid)
    {
        // Select the car
        $sessionData = request()->session()->get('booking_data');
        $sessionData['car'] = $hashid;

        request()->session()->put('booking_data', $sessionData);        

        return redirect()->route('insurances', $hashid);
    }

    protected function carSearch()
    {
        $this->carSearchObject = $this->carsSearcRepository->search( 
            $this->categories, //types
            $this->selectables, //specs
            $this->dates, //dates
            $this->locations //locations
        );
        
        $this->cars = $this->carSearchObject->cars;                   
    }

    protected function setCategory($categoryId) {
        if(isset($this->categories[$categoryId])) {
            unset($this->categories[$categoryId]);
        } else {
            $this->categories[$categoryId] = $categoryId;
        }
    }

    protected function setSelectable($selectableId, $value) {
        if($value){
            $this->selectables[$selectableId] = $value;
        } else {
            if(isset($this->selectables[$selectableId])) {
                unset($this->selectables[$selectableId]);
            }
        }
    }

    protected function setSelectables() {
        foreach($this->allSelectables->getAll() as $instance => $selectable) {
            $this->setSelectable($instance, $selectable->getAllItemValue());
        }
    }

    public function render()
    {     
        return view('livewire.car-search-results', ['carCategories' => app(CarFiltersRepositoryInterface::class)->types(), 'searchByDates' => $this->carSearchObject->searchByDates ]);
    }
}
