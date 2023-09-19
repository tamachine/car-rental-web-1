<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Interfaces\ContactFormRepositoryInterface;

class ContactForm extends Component
{
    public function mount()
    {
        //
    }
    
    public function render()
    {
        return view('livewire.contact-form');
    }

}
