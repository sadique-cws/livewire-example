<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    #[Validate("required|email|max:255")]
    public $email;

    #[Validate("required|string|min:6")]
    public $password;


    public function login(){
        $data = $this->validate();

        if(Auth::attempt($data)){
            session()->flash("message", "Login successful.");
            redirect("/");
        }
        else{
            session()->flash("error", "Invalid credentials. Please try again.");
        }
        }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
