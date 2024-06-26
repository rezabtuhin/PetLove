<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('components.layout')]
class Login extends Component
{

    public string $title = "PetLove | Login";
    public string $email;
    public string $password;

    public function render()
    {
        return view('livewire.login')->layoutData([
            'title' => $this->title
        ]);
    }

    public function login()
    {
        dd("hehe");
    }
}
