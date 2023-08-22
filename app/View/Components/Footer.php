<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App;

class Footer extends Component
{
    /**
     * The image path.
     *
     * @var string
     */
    public $imagePath;

    public $items;

    protected $hrefs;

    protected $columns;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($imagePath)    
    {        
        $this->imagePath = $imagePath;

        $this->setColumns();

        $this->setHrefs();

        $this->setItems();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer');
    }

    /**
     * Set the items with the column title, text item and href item
     */
    protected function setItems() {        

        foreach($this->hrefs as $column => $items) {
            $this->items[$column]['title'] =$this->columns[$column];

            foreach($items as $row => $href) {
                $this->items[$column]['items'][] = ['text' => __('footer.col-'.$column.'-link-'.$row), 'href' => $href];   
            }

        }       
    }

    /**
     * Set the column titles. These titles are stores in FooterSeeder
     */
    protected function setColumns() {
        for ($i = 1; $i <= 4; $i++) {
            $this->columns[$i] =  __('footer.col-'.$i.'-links-title');
        }       
    }

    /**
     * Set the hrefs for every item
     */
    protected function setHrefs() {
        //useful links
        $this->hrefs[1][1] = 'https://www.road.is/'; // Road conditions
        $this->hrefs[1][2] = 'https://www.safetravel.is/'; // Safe travel
        $this->hrefs[1][3] = 'https://en.vedur.is/'; // Weather
        $this->hrefs[1][4] = 'https://www.reykjavikauto.com/'; //Car Rental Iceland
        $this->hrefs[1][5] = 'https://www.xe.com/currencyconverter/convert/?Amount=1&From=USD&To=ISK'; // Exchange rate        

        //Regions
        $this->hrefs[2][1] = 'https://www.south.is/'; // South Iceland
        $this->hrefs[2][2] = 'https://www.visitreykjavik.is/'; // Visit Reyjkavik
        $this->hrefs[2][3] = 'https://www.northiceland.is/'; // North Iceland
        $this->hrefs[2][4] = 'https://www.east.is/'; // East Iceland
        $this->hrefs[2][5] = 'https://www.west.is/'; // West Iceland
        $this->hrefs[2][6] = 'https://www.westfjords.is/'; // Westfjords

        //Shortcuts
        $this->hrefs[3][1] = 'https://www.reykjavikauto.com/car-rental-keflavik-airport'; // Keflavik airport
  
        if(App::getLocale() == 'es') {
            $this->hrefs[3][2] = 'https://www.reykjavikauto.com/alquiler-coches-islandia'; // Reykjavik Car Rental        
        } elseif(App::getLocale() == 'de') {
            $this->hrefs[3][2] = 'https://www.reykjavikauto.com/mietwagen-island'; //Reykjavik Car Rental    
        } else {
            $this->hrefs[3][2] = 'https://www.reykjavikauto.com/car-rental-reykjavik'; // Reykjavik Car Rental
        }
        
        $this->hrefs[3][3] = 'https://www.reykjavikauto.com/location-voiture-islande'; // Location Voiture

        //Privacy & terms
        $this->hrefs[4][1] = route('cancellation'); // Cancellation policy
        $this->hrefs[4][2] = route('terms'); // Terms and conditions
        $this->hrefs[4][3] = route('privacy'); // Privacy and cookie policy
        $this->hrefs[4][4] = route('legal'); // Legal notice
    }
}
