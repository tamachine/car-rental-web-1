<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tamara extends Component
{
    public $text = 'holaaa'; 

    public function tamara()
    {
        $this->text = 'adios';
    }
    public function render()
    {
        return view('livewire.tamara');
    }
}
