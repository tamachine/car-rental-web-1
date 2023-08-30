<?php

namespace App\Traits\Livewire;

trait ModalTrait
{
    /**
     * @var bool
     */
    public $showModal = false;     

    public function closeModal()
    {
        $this->showModal = false;
    }
}
