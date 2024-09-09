<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Clinic extends Component
{

    public function render()
    {
        $clinics = User::where('role', 'clinic')->get();
        return view('livewire.clinic', compact('clinics'));
    }
}
