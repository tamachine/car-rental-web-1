<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\BlogPostRepositoryInterface;
use App\Interfaces\PageRepositoryInterface;
use App\Interfaces\ExtendsWebLayoutInterface;
use App\Models\SeoConfiguration;
use App\Services\CarsSearch\InitialValues;
use App\Services\CarsSearch\ValidateCarSearchDates;
use App\Services\CarsSearch\ValidateCarSearchLocations;
use App\Traits\Nave\ExtendsWebLayout;
use Illuminate\Support\Facades\Route;

class CarsController extends Controller implements ExtendsWebLayoutInterface
{
    use ExtendsWebLayout;

    protected $pageRepository;

    protected $dates;
    protected $datesFormatted;

    protected $locations;

    protected $validationErrors;

    public function __construct(InitialValues $initialValues, PageRepositoryInterface $pageRepository) {     
        $this->pageRepository = $pageRepository;

        $this->dates          = $initialValues->getDates(); 
        $this->datesFormatted = $initialValues->getDatesFormatted(); 
        $this->locations      = $initialValues->getLocations();
    }

    public function index()
    {            
        if($this->validateValues()){  //it will show cars filtered by data

            checkSessionCar();

        } else { //it will show cars with a 'from price'

            $params = [
                'dataErrors' => $this->validationErrors
            ];
            
        }              

        $params = [
            'dates'     => $this->datesFormatted,
            'locations' => $this->locations
        ]; 

        return view(
            'cars.index',
                array_merge(
                    [ 'breadcrumbs'   => getBreadcrumb(['home', 'cars']) ], 
                    $params,
                    $this->webLayoutViewParams()
                    )
            );           
    }

    public function getSeoConfiguration(): SeoConfiguration
    {
        return $this->pageRepository->seoConfiguration(Route::currentRouteName());
    }

    public function footerImagePath() : string
    {       
        return asset('/images/footer/home.png');
    }

    public function footerWebpImagePath() : string
    {       
        return asset('/images/footer/home.webp');
    }

    protected function validateValues() {

        $dates = new ValidateCarSearchDates($this->dates['from'], $this->dates['to']);

        $this->validationErrors = $dates->getErrors();

        $locations = new ValidateCarSearchLocations($this->locations['pickup'], $this->locations['dropoff']);

        $this->validationErrors = array_merge($dates->getErrors(), $locations->getErrors());

        return $dates->check() && $locations->check();
    }
}
