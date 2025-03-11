<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Title;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $email = '';
    
    public $password = '';

    
    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $this->email)->first();
    
        if($user && Hash::check($this->password, $user->password)){
            session()->put('user', $user->id);
            return $this->redirect('create-post');
        } else {
            return redirect()->back()->with('fail', 'Invalid Credentials');
        }
        
    }

    #[Title('Login')] 
    public function render()
    {
        return view('livewire.login');
    }
}
