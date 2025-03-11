<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Title;
use App\Models\User;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function save()
    {
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create(
            $this->only([
                'name', 
                'email', 
                'password',
            ])
        );
        return $this->redirect('/');
    }

    #[Title('Register')]
    public function render()
    {
        return view('livewire.register');
    }
}
