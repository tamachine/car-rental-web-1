<?php

namespace App\Http\Livewire;

use App\Mail\ContactFormSubmitted;
use Livewire\Component;
use App\Traits\Livewire\ModalTrait;
use Illuminate\Support\Facades\Mail;

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

    public function send()
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'name'      => ['required'],
            'email'     => ['required', 'email'],
            'subject'   => ['required'],
            'type'      => ['required'],
            'message'   => ['required'],
        ]);

        $request = collect();
        $request->put('name', $this->name);
        $request->put('email', $this->email);
        $request->put('subject', $this->subject);
        $request->put('type', __('contact.enquiry_' . $this->type));
        $request->put('message', $this->message);

        Mail::to(config('settings.email.contact'))->send(new ContactFormSubmitted($request));

        $this->name = "";
        $this->email = "";
        $this->subject = "";
        $this->type = "general";
        $this->message = "";

        $this->showModal = true;
    }
  
}
