<?php

namespace App\Http\Livewire;

use App\Interfaces\NewsletterUserRepositoryInterface;
use Livewire\Component;

class NewsletterSubmit extends Component
{

     /**
     * @var string
     */
    public $newsletter_email;  

    public $containerClass;
    public $inputClass;
    public $buttonClass;    
    public $buttonText;
    public $modalId;
    
    public function render()
    {
        return view('livewire.newsletter-submit');
    }

    public function submitNewsletter(NewsletterUserRepositoryInterface $newsletterUserRepository)
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'newsletter_email'  => ['required', 'email'],
        ]);
        
        $newsletterUserRepository->submitted($this->newsletter_email);

        $this->reset('newsletter_email');
                 
        $this->emit('openModal:'.$this->modalId);  
    }
}
