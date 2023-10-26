<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Interfaces\BookingRepositoryInterface;
use App\Interfaces\CarRepositoryInterface;
use App\Interfaces\ExtendsWebLayoutInterface;
use App\Interfaces\PageRepositoryInterface;
use App\Interfaces\ValitorRepositoryInterface;
use App\Models\Car;
use App\Models\SeoConfiguration;
use App\Traits\Nave\ExtendsWebLayout;
use Illuminate\Support\Facades\Route;

class SuccessController extends Controller implements ExtendsWebLayoutInterface
{
    use ExtendsWebLayout;

    protected $pageRepository;
    protected $bookingRepository;
    protected $valitorRepository;

    protected $booking;  

    public function __construct(PageRepositoryInterface $pageRepository, BookingRepositoryInterface $bookingRepository, ValitorRepositoryInterface $valitorRepository) {
        $this->pageRepository    = $pageRepository;      
        $this->bookingRepository = $bookingRepository;       
        $this->valitorRepository = $valitorRepository;       
    }
    
    public function index()
    {           
        if (!checkSessionPayment()) {
            return redirect()->route('cars');
        }

        $this->setBooking();

        $this->setValitorResponseToBooking();
        
        if(!$this->valitorRepository->checkResponse(request()->all(), $this->booking->hashid)) {
            return view('success.error');
        }

        $this->confirmBooking();

        $this->bookingRepository->pdf($this->booking->hashid, true);

        return view(
            'success.index', 
            $this->webLayoutViewParams()
        );    
    
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

    protected function setBooking() {
        $bookingHashid = request()->session()->get('booking_data')['booking'];

        $this->booking = $this->bookingRepository->findbyHashid($bookingHashid);
    }

    protected function setValitorResponseToBooking() {        
        $this->bookingRepository->update($this->booking->hashid, ['valitor_response' => request()->all()]);             
    }  

    protected function confirmBooking() {
        $this->bookingRepository->update($this->booking->hashid, ['payment_status' => 'confirmed']);             
    }

}
