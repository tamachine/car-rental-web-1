<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Helpers\Currency;
use App\Helpers\Language;

class LanguageSelector extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $route;
    public $currencies;
    
    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount() {
        $this->route = request()->route() ? request()->route()->getName() : null;
        $this->currencies = Currency::availableCurrencies();
    }

    public function changeLanguage($code, $urlToRedirect)
    {
        Language::setLanguageInSession($code);
        
        return redirect($urlToRedirect);
    }

    public function changeCurrency($code, $urlToRedirect)
    {
        Currency::setCurrencyInSession($code);

        return redirect($urlToRedirect);
    }

    public function render()
    {        
        return view('livewire.language-selector');
    }
}
