<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\Livewire\ModalTrait;
use App\Interfaces\ContactFormRepositoryInterface;

class ContactForm extends Component
{
    use ModalTrait;
    
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $message;    

     /**
     * @var bool
     */
    public $submitButtonCentered;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount(bool $submitButtonCentered = true)
    {
        $this->type = 'general';
        $this->submitButtonCentered = $submitButtonCentered;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function send(ContactFormRepositoryInterface $contactFormRepository)
    {
        $this->dispatchBrowserEvent('validationError');

        $params = $this->validate([
            'name'      => ['required'],
            'email'     => ['required', 'email'],
            'subject'   => ['required'],
            'type'      => ['required'],
            'message'   => ['required'],
        ]);

        $contactFormRepository->send($params);

        $this->reset(['name', 'email', 'subject','message']);
      
        $this->type = "general";

        $this->showModal = true;
    }
  
}
