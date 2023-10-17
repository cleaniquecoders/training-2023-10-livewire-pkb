<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserDatatable extends Component
{
    public $search = '';
    public $perPage = 15;
    public $isActive;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.user-datatable', [
            'users' => User::query()
                ->when(
                    $this->isActive == 1,
                    fn($query) => $query->active(),
                )
                ->when(
                    $this->isActive == 2,
                    fn($query) => $query->inActive(),
                )
                ->when(
                    strlen($this->search) > 3,
                    fn($query) => $query->search($this->search)
                )->paginate($this->perPage),
        ]);
    }
}
