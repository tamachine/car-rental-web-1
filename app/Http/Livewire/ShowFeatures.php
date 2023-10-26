<?php

namespace App\Http\Livewire;

use App\Interfaces\InsuranceFeatureRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\Paginator;

class ShowFeatures extends Component
{
    use WithPagination;

    const PER_PAGE = 3;

    public $featuresPerPage;

    protected $featuresFirstColumn = [];
    protected $featuresSecondColumn = [];
    protected $buttonVisibility;

    public $paginate = false;

    public function mount($paginate = false){
        $this->featuresPerPage = self::PER_PAGE;

        $this->paginate = $paginate;

        $this->setFeatures();        
    }

    /**     
     * @return response()
     */
    public function loadMore()
    {
        $this->featuresPerPage = $this->featuresPerPage + self::PER_PAGE;
    }

    public function render()
    {        
        $this->setFeatures();        

        return view('livewire.show-features', [
            'featuresFirstColumn'  => $this->featuresFirstColumn,
            'featuresSecondColumn' => $this->featuresSecondColumn,
            'showButton' => $this->buttonVisibility
        ]);
    }

    protected function setFeatures(){
        $paginator = app(Paginator::class);
        $insuranceFeatureRepository = app(InsuranceFeatureRepositoryInterface::class);

        $insuranceFeatureCount = count($insuranceFeatureRepository->all());

        if($this->paginate) {
            $this->featuresFirstColumn = $paginator->paginate($insuranceFeatureRepository->all(), $this->page -1, $this->featuresPerPage); 

            $this->buttonVisibility = $insuranceFeatureCount > $this->featuresFirstColumn->count();
        } else {
            $featuresPerColumn = round($insuranceFeatureCount / 2);

            $this->featuresFirstColumn  = collect($insuranceFeatureRepository->all())->take($featuresPerColumn);    
            $this->featuresSecondColumn = collect($insuranceFeatureRepository->all())->skip($featuresPerColumn);    

            $this->buttonVisibility = false;
        }
    }
}
