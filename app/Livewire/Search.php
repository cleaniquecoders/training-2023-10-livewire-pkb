<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Search extends Component
{
    public string $search = '';
    public $users;

    public function mount()
    {
        $this->users = collect();
    }

    public function updatedSearch()
    {
        if(strlen($this->search) > 3) {
            $this->users = User::search($this->search)->get();
        } else {
            $this->users = collect();
        }
    }

    public function render()
    {
        return view('livewire.search');
    }
}
