<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('components.layout')]
class Login extends Component
{

    public string $title = "PetLove | Login";
    public string $email = '';
    public string $password = '';

    protected array $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function render()
    {
        return view('livewire.login')->layoutData([
            'title' => $this->title
        ]);
    }

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        session()->flash('error', 'The provided credentials do not match our records.');
        return redirect()->back();
    }
}
