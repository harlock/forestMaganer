<?php

namespace App\Http\Livewire;

//use Livewire\Component;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ConfirmDelete extends Component
{
    public function render()
    {
        return view('livewire.confirm-delete');
    }
}
