<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\CarRepositoryInterface;
use App\Interfaces\ExtendsWebLayoutInterface;
use App\Interfaces\InsuranceFeatureRepositoryInterface;
use App\Models\SeoConfiguration;
use App\Traits\Nave\ExtendsWebLayout;
use Illuminate\Support\Facades\Route;

class InsurancesController extends Controller implements ExtendsWebLayoutInterface
{
    use ExtendsWebLayout;

    protected $carRepository;

    protected $pageRepository;   

    protected $insuranceFeatureRepository;

    protected $car;

    public function __construct(CarRepositoryInterface $carRepository, InsuranceFeatureRepositoryInterface $insuranceFeatureRepository) {
        $this->carRepository = $carRepository;
        $this->insuranceFeatureRepository = $insuranceFeatureRepository;
    }
    
    public function index(string $car_hash_id)
    {           
        if (!checkSessionInsurances()) {
            return redirect()->route('cars');
        }

        $this->car = $this->findOrfail($this->carRepository->findByHashid($car_hash_id));

        return view(
            'insurances.index', 
                array_merge(
                    $this->webLayoutViewParams(),
                [
                    'car' => $this->car, 'insurances' => $this->carRepository->insurances($car_hash_id), 'InsuranceFeatures' => $this->insuranceFeatureRepository->all()
                ])
        );
    
    }

    public function getSeoConfiguration(): SeoConfiguration
    {
        return $this->carRepository->seoConfiguration($this->car->hashid, Route::currentRouteName());
    }

    public function footerImagePath() : string
    {       
        return asset('/images/footer/insurances.png');
    }

    public function footerWebpImagePath() : string
    {       
        return asset('/images/footer/insurances.webp');
    }

}
