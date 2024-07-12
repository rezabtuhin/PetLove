<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{

    public bool $infoExists = false;
    public $petInterestOptions = array(
            'Pet adoption',
            'Pet events',
            'Pet care tips',
            'Pet grooming',
            'Pet training',
            'Pet health',
            'Pet accessories',
            'Pet behavior',
            'Pet insurance',
            'Pet food',
            'Pet toys',
            'Pet photography',
            'Pet fashion',
            'Pet technology',
            'Pet transport',
            'Pet rehabilitation',
            'Pet-friendly travel',
            'Pet blogs',
            'Pet advocacy',
            'Other'
    );

    public $petService = array(
        "Boarding",
        "Grooming",
        "Veterinary services",
        "Training",
        "Pet sitting",
        "Dog walking",
        "Pet daycare",
        "Pet transport services",
        "Pet photography",
        "Pet grooming supplies",
        "Pet insurance services",
        "Pet food and treats",
        "Behavioral training",
        "Emergency veterinary services",
        "Pet wellness services"
    );

    public $comChannel = array(
        "Phone",
        "Email",
        "Chat"
    );


    public string $bio = "";
    public string $gender = "";
    public string $location = "";
    public array $preferred_pet_service = [];
    public array $pet_interest = [];
    public array $preferred_communication = [];


    public function save(){
        dd($this->pet_interest, $this->preferred_pet_service, $this->preferred_communication);
    }

    public function render()
    {
        $infoExists = Auth::user()->additionalInfo()->exists();
        return view('livewire.profile');
    }
}
