<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\PageRepositoryInterface;
use App\Interfaces\ExtendsWebLayoutInterface;
use Illuminate\Support\Facades\Route;
use App\Models\SeoConfiguration;
use App\Traits\Nave\ExtendsWebLayout;

class LandingCarsController extends Controller implements ExtendsWebLayoutInterface
{

    use ExtendsWebLayout;

    protected $categories;

    protected $type;

    protected $otherlandings = [];

    protected $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository) {
        $this->pageRepository = $pageRepository;        
    }

    public function index()
    {        
        return view(
            'landing-cars.index',
            array_merge([
                'categories' => $this->categories,
                'type' => $this->type,
                'otherlandings' => $this->otherlandings
            ], $this->webLayoutViewParams())
        );
    }

    public function small()
    {
        $this->categories = ['small', 'medium'];
        $this->type = 'small';
        $this->otherlandings = [
            [
                'type' => 'large',
                'route' => route('cars.large'),
                'image' => asset('images/landing-cars/large-cars_mb.jpg'),
                'webp_image' => asset('images/landing-cars/large-cars_mb.webp')
            ],
            [
                'type' => 'premium',
                'route' => route('cars.premium'),
                'image' => asset('images/landing-cars/premium-cars_mb.jpg'),
                'webp_image' => asset('images/landing-cars/premium-cars_mb.webp')
            ]
        ];

        return $this->index();
    }

    public function large()
    {
        $this->categories = ['large'];
        $this->type = 'large';
        $this->otherlandings = [
            [
                'type' => 'small',
                'route' => route('cars.small'),
                'image' => asset('images/landing-cars/small-cars_mb.jpg'),
                'webp_image' => asset('images/landing-cars/small-cars_mb.webp')
            ],
            [
                'type' => 'premium',
                'route' => route('cars.premium'),
                'image' => asset('images/landing-cars/premium-cars_mb.jpg'),
                'webp_image' => asset('images/landing-cars/premium-cars_mb.webp')
            ]
        ];

        return $this->index();
    }

    public function premium()
    {
        $this->categories = ['premium'];
        $this->type = 'premium';
        $this->otherlandings = [
            [
                'type' => 'small',
                'route' => route('cars.small'),
                'image' => asset('images/landing-cars/small-cars_mb.jpg'),
                'webp_image' => asset('images/landing-cars/small-cars_mb.webp')
            ],
            [
                'type' => 'large',
                'route' => route('cars.large'),
                'image' => asset('images/landing-cars/large-cars_mb.jpg'),
                'webp_image' => asset('images/landing-cars/large-cars_mb.jpg')
            ]
        ];

        return $this->index();
    }

    public function getSeoConfiguration(): SeoConfiguration
    {
        return $this->pageRepository->seoConfiguration(Route::currentRouteName());
    }

    public function footerImagePath() : string
    {
        return asset('images/footer/landing-cars.png');
    }

    public function footerWebpImagePath() : string
    {
        return asset('images/footer/landing-cars.webp');
    }
}


