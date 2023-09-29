<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\CarRepositoryInterface;
use App\Interfaces\ExtendsWebLayoutInterface;
use App\Models\SeoConfiguration;
use App\Traits\Nave\ExtendsWebLayout;
use Illuminate\Support\Facades\Route;

class ExtrasController extends Controller implements ExtendsWebLayoutInterface
{
    use ExtendsWebLayout;

    protected $carRepository;

    protected $car;

    public function __construct(CarRepositoryInterface $carRepository) {
        $this->carRepository = $carRepository;
    }
    
    public function index(string $car_hash_id)
    {           
        if (!checkSessionExtras()) {
            return redirect()->route('cars');
        }

        $this->car = $this->findOrfail($this->carRepository->findByHashid($car_hash_id));

        return view(
            'extras.index', 
                array_merge(
                    $this->webLayoutViewParams(),
                [
                    'car' => $this->car, 
                    'showSummary' => (null !== request()->query('showSummary')) ? request()->query('showSummary') : false
                ])
        );    
    }

    public function getSeoConfiguration(): SeoConfiguration
    {
        return $this->carRepository->seoConfiguration($this->car->hashid, Route::currentRouteName());
    }

    public function footerImagePath() : string
    {       
        return asset('/images/footer/extras.png');
    }

    public function footerWebpImagePath() : string
    {       
        return asset('/images/footer/extras.webp');
    }

}
