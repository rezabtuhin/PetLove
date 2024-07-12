<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layout')]
class Register extends Component
{

    public string $title = "PetLove | Register";

    public string $name;
    public string $email;
    public string $password;
    public string $password_confirmation;
    public bool $termsAccepted = false;

    protected $rules = [
        'name' => 'required|string|min:4',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'termsAccepted' => 'accepted',
    ];

    public function render()
    {
        return view('livewire.register')->layoutData([
            'title' => $this->title
        ]);
    }

    public function register()
    {
        $validatedData = $this->validate();

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('login');
    }
}
