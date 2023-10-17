<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UserDatatable extends Component
{
    use WithPagination;

    #[Url(as: 'q')]
    public $search = '';

    #[Url]
    public $perPage = 15;

    #[Url(as: 'status')]
    public $isActive;

    #[Url]
    public $sortBy = 'id';

    #[Url]
    public $sortDirection = 'asc';

    public $selectedRows = [];

    public function removeUser($id)
    {
        if(auth()->user()->id == $id) {
            return;
        }

        User::where('id', $id)->delete();
    }

    public function setSort($field)
    {
        if($this->sortBy == $field) {
            $this->sortDirection = $this->sortDirection == 'desc' ? 'asc' : 'desc';
            return;
        }

        $this->sortBy = $field;
        $this->sortDirection = 'desc';
    }

    public function updateUsersStatus($status)
    {
        if(! count($this->selectedRows)) {
            return;
        }

        $this->setStatus(
            array_keys($this->selectedRows),
            $status
        );

        $this->resetPage();
    }

    public function setStatus(int|array $id, $status)
    {
        if(is_int($id)) {
            $id = [$id];
        }

        if(in_array(auth()->user()->id, $id)) {
            return;
        }

        User::whereIn('id', $id)->update([
            'is_active' => $status,
        ]);
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
                )
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage),
        ]);
    }
}
