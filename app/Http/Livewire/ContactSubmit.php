<?php

namespace App\Http\Livewire;

use App\Interfaces\ContactFormRepositoryInterface;
use Livewire\Component;

class ContactSubmit extends Component
{

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

    public $modalId;

    protected $contactFormRepository;


    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */
    public function boot(ContactFormRepositoryInterface $contactFormRepository){
              
        $this->contactFormRepository = $contactFormRepository;
    }

    public function mount(bool $submitButtonCentered = true)
    {   
        $this->submitButtonCentered = $submitButtonCentered;
    }

    public function getEnquiryTypesProperty()
    {
        $types = $this->contactFormRepository->types();
        $this->type = $types[0]->hashid;
        return $types;  
    }

    public function render()
    {
        return view('livewire.contact-submit');
    }

    public function send()
    {
        $this->dispatchBrowserEvent('validationError');

        $params = $this->validate([
            'name'      => ['required'],
            'email'     => ['required', 'email'],
            'subject'   => ['required'],
            'type'      => ['required'],
            'message'   => ['required'],
        ]);

        $this->contactFormRepository->send($params);

        $this->reset(['name', 'email', 'subject','message']);
        
        $this->emit('openModal:'.$this->modalId); 
    }
}
