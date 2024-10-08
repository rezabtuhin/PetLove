<?php

namespace App\Livewire;

use App\Models\AdditionalInfo;
use App\Models\Pet;
use App\Models\User;
use Carbon\Carbon;
use Cassandra\Date;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{

    use WithFileUploads;

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
    public string $phone = "";
    public string $gender = "";
    public string $location = "";
    public array $preferred_pet_service = [];
    public array $pet_interest = [];
    public array $preferred_communication = [];

    #[Rule('required|image|mimes:jpeg,png|max:5120')]
    public $image;




    # New pet information
    #[Rule('required')]
    public string $petName = "";

    #[Rule('required')]
    public array $type = [];

    #[Rule('required')]
    public string $breed = "";

    #[Rule('required')]
    public string $petGender = "";

    #[Rule('required')]
    public string $dob = "";

    #[Rule('required')]
    public array $colors = [];

    #[Rule('required|image|mimes:jpeg,png|max:5120')]
    public $petImage;

    public $pets;

    public function save(){
        $additionalInfo = AdditionalInfo::updateOrCreate(
            ['user_id' => Auth::user()->id],
            [
                'bio' => $this->bio,
                'phone' => $this->phone,
                'gender' => $this->gender,
                'location' => $this->location,
                'preferred_pet_service' => $this->preferred_pet_service,
                'pet_interest' => $this->pet_interest,
                'preferred_communication' => $this->preferred_communication,
            ]
        );
        session()->flash('message', 'Profile update successfully');
        return redirect()->to('/profile');
    }

    protected $listeners = ['removePhotoConfirmed' => 'removePhoto'];
    public function removePhoto(){
        dd("deleted");
    }

    public function uploadPicture(){
        $extension = $this->image->getClientOriginalExtension();
        $imagePath = $this->image->storeAs('uploads/profile_picture/'.Auth::user()->id, Auth::user()->id.'.'.$extension, 'public');
        User::where('id', Auth::user()->id)
            ->update([
                'avatar' => '/storage/'.$imagePath
            ]);
        session()->flash('message', 'Image uploaded successfully');
        return redirect()->to('/profile');
    }

    public function mount()
    {
        $user = auth()->user();
        $additionalInfo = $user->additionalInfo;
        $this->pets = $user->pet;
        if ($additionalInfo) {
            $this->bio = $additionalInfo->bio;
            $this->phone = $additionalInfo->phone;
            $this->gender = $additionalInfo->gender;
            $this->location = $additionalInfo->location;
            $this->pet_interest = $additionalInfo->pet_interest;
            $this->preferred_pet_service = $additionalInfo->preferred_pet_service;
            $this->preferred_communication = $additionalInfo->preferred_communication;
        }
    }

    public function render()
    {
        $infoExists = Auth::user()->additionalInfo()->exists();
        return view('livewire.profile');
    }

    /**
     * @throws \Exception
     */
    public function addPet(){
        try {
            $extension = $this->petImage->getClientOriginalExtension();
            $imagePath = $this->petImage->storeAs('uploads/pet_picture/'.Auth::user()->id, time().'.'.$extension, 'public');
            $dob = Carbon::parse($this->dob);
            Pet::create([
                'user_id' => auth()->id(),
                'petName' => $this->petName,
                'image' => '/storage/'.$imagePath,
                'type' => $this->type,
                'breed' => $this->breed,
                'petGender' => $this->gender,
                'dob' => $dob,
                'colors' => $this->colors,
            ]);
            session()->flash('message', 'Pet added successfully');
            return redirect()->to('/profile');
        }catch (\Exception $e){
            dd($e);
        }
    }
}
