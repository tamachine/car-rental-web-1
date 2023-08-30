<?php

namespace App\Http\Livewire;

use App\Interfaces\NewsletterUserRepositoryInterface;
use App\Mail\ContactNewsletterSubmitted;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

use App\Traits\Livewire\ModalTrait;

class NewsletterForm extends Component
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
    public $newsletter_email;    

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        //
    }

    public function render()
    {
        return view('livewire.newsletter-form');
    }

    public function send(NewsletterUserRepositoryInterface $newsletterUserRepository)
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'newsletter_email'  => ['required', 'email'],
        ]);

        $request = collect();
        $request->put('email', $this->newsletter_email);

        Mail::to(config('settings.email.newsletter'))->send(new ContactNewsletterSubmitted($request));

        $newsletterUserRepository->submitted($this->newsletter_email);

        $this->reset();
        
        $this->showModal = true;
    }
}
