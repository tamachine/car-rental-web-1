<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Models\Car;

class CarCard extends Component
{
    public $car;
    public $canBeBooked;
    public $redirectToCarsPage;

    protected $secondaryImage;
    protected $mainImageModelImage = null;    
    protected $mainImagePath = null;    

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Car $car, Bool $canBeBooked = true, Bool $redirectToCarsPage = false)
    {        
        $this->car = $car;
        $this->canBeBooked = $canBeBooked;
        $this->redirectToCarsPage = $redirectToCarsPage;

        $this->setImages();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view(
            'components.car-card',
            [
                'hasHover' => $this->hasHover(),
                'mainImageModelImage' => $this->mainImageModelImage,
                'mainImagePath' => $this->mainImagePath,
                'secondaryImage' => $this->secondaryImage,            
            ]
        );
    }       

    protected function hasHover() {
        return ($this->secondaryImage != null);
    }   

    protected function setImages() {
        if($this->car->featured_image) {           
            $this->mainImageModelImage = $this->car->getFeaturedImageModelImageInstance; 

            if($this->car->featured_image_hover) {
                $this->secondaryImage = $this->car->getFeaturedImagaHoverModelImageInstance; 
            }
        } else {            
            $this->mainImagePath = 'images/cars/default-car.jpg';
        }
    }    
}
