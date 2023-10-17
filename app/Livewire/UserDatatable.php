<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserDatatable extends Component
{
    public $search = '';
    public $perPage = 25;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.user-datatable', [
            'users' => User::query()
                ->when(
                    strlen($this->search) > 3,
                    fn($query) => $query->search($this->search)
                )->paginate($this->perPage),
        ]);
    }
}
