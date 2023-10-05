<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\CarRepositoryInterface;
use App\Interfaces\ExtendsWebLayoutInterface;
use App\Interfaces\PageRepositoryInterface;
use App\Models\Car;
use App\Models\SeoConfiguration;
use App\Traits\Nave\ExtendsWebLayout;
use Illuminate\Support\Facades\Route;

class SuccessController extends Controller implements ExtendsWebLayoutInterface
{
    use ExtendsWebLayout;

    protected $pageRepository;

    protected $carRepository;

    protected $car;

    public function __construct(PageRepositoryInterface $pageRepository, CarRepositoryInterface $carRepository) {
        $this->pageRepository = $pageRepository;
        $this->carRepository  = $carRepository;
    }
    
    public function index(Car $car)
    {           
        echo "TODO";    
    }

    public function getSeoConfiguration(): SeoConfiguration
    {
        return $this->pageRepository->seoConfiguration(Route::currentRouteName());
    }

    public function footerImagePath() : string
    {       
        return asset('/images/footer/success.png');
    }

    public function footerWebpImagePath() : string
    {       
        return asset('/images/footer/success.webp');
    }

}
