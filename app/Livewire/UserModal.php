<?php

namespace App\Livewire;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class UserModal extends ModalComponent
{
    public $user;

    public function mount($id)
    {
        $this->user = User::whereId($id)->first();
    }

    public function render()
    {
        return view('livewire.user-modal');
    }
}
