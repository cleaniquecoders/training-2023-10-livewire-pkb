<?php

namespace App\Livewire;

use App\Models\ContactUs as Model;
use Livewire\Component;

class ContactUs extends Component
{
    public string $email;
    public string $name;
    public string $subject;
    public string $message;

    protected $rules = [
        'name' => ['required', 'min:5', 'max:255'],
        'email' => ['required', 'email', 'min:5', 'max:255'],
        'subject' => ['required', 'min:5', 'max:255'],
        'message' => ['required', 'min:5', 'max:10000'],
    ];

    public function save()
    {
        $this->validate();

        Model::create([
            'email' => $this->email,
            'name' => $this->name,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        $this->dispatch('saved');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-us');
    }
}
