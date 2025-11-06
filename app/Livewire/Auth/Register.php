<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\User;

class Register extends Component
{

    #[Validate("required|string|max:255")]
    public $name;
    
    #[Validate("required|email|max:255|unique:users,email")]
    public $email;
    
    #[Validate("required|string|min:6")]
    public $password;


    public function register(){
        $data = $this->validate();


        $user = User::create($data); 

        if($user){
            // You can log the user in or redirect as needed
            session()->flash("message", "User registered successfully.");
        }
        else{
            session()->flash("error", "Registration failed. Please try again.");
        }
        // reset
        $this->reset(["name", "email", "password"]);
        redirect("/login");
       
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
