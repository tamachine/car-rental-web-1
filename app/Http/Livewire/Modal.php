<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    /**
     * @var bool
     */
    public $showModal = false;     

    public $modalTitle;

    public $modalText;
    
    protected $listeners = ['openModal' => 'openModal'];

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
