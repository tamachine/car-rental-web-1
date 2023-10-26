<?php

namespace App\Http\Controllers;

use App\Interfaces\ExtendsWebLayoutInterface;
use App\Interfaces\InsuranceRepositoryInterface;
use App\Interfaces\PageRepositoryInterface;
use App\Models\SeoConfiguration;
use App\Traits\Nave\ExtendsWebLayout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

class LandingInsurancesController extends Controller implements ExtendsWebLayoutInterface
{

    use ExtendsWebLayout;

    protected $pageRepository;

    protected $insuranceRepository;

    public function __construct(PageRepositoryInterface $pageRepository, InsuranceRepositoryInterface $insuranceRepository) {
        $this->pageRepository = $pageRepository;        
        $this->insuranceRepository = $insuranceRepository;
    }

    public function index()
    {                
        return view('landing-insurances.index', array_merge(['insurances' => $this->insuranceRepository->all()], $this->webLayoutViewParams()));
    }

    public function getSeoConfiguration(): SeoConfiguration
    {        
        return $this->pageRepository->seoConfiguration(Route::currentRouteName());
    }

    public function footerImagePath() : string
    {
        return asset('images/footer/landing-insurances.png');
    }

    public function footerWebpImagePath() : string
    {
        return asset('images/footer/landing-insurances.webp');
    }
}


