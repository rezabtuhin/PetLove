@php use Carbon\Carbon; @endphp
<div>
    <div class="hero">
        <div class="images flex gap-2">
            @if(Auth::user()->oauth_type || Auth::user()->avatar)
                <img src="{{ asset(Auth::user()->avatar) }}" class="rounded-xl" width="200px" height="200px"/>
            @else
                <div class="bg-gray-600 flex items-center justify-center" style="width: 200px; height: 200px">
                    <p class="text-lg font-black "> {{ Auth::user()->name[0] }}</p>
                </div>
            @endif
            <div class="general-info flex flex-col">
                <h1 class="font-black text-4xl">{{ Auth::user()->name }}</h1>
                <span class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                    <a class="text-blue-500 hover:underline text-[17px] font-bold " href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
                </span>
                <span class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                    </svg>
                    @if($phone != "")
                        <a class="text-blue-500 hover:underline text-[17px] font-bold " href="tel:{{ $phone }}">{{ $phone }}</a>
                    @else
                        <p class="text-[17px] font-bold">Not Enough Information</p>
                    @endif
                </span>
                <div class="mt-7">
                    <form wire:submit.prevent="uploadPicture" enctype="multipart/form-data" >
                        <div wire:ignore>
                            <div class="flex gap-2">
                                <div class="flex items-center gap-11">
                                    <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white" for="small_size">Change picture</label>
                                    <button type="submit" class="py-2 px-3 mb-1 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Upload</button>
                                </div>
                                <button id="remove-photo" type="button" class="py-2 px-3 mb-1 text-sm font-medium text-white bg-red-700 hover:bg-red-800 rounded-full border border-gray-200 focus:z-10 focus:ring-4 focus:ring-gray-100">Remove</button>
                            </div>
                            <input wire:model="image" accept="image/jpeg, image/png" class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="small_size" type="file">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="information" wire:ignore>
            <div class="mt-4 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="p-3 border-b-2 rounded-t-lg inline-flex items-center justify-center gap-2" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <span>About me</span>
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-flex items-center justify-center gap-2 p-3 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            <span>My Orders</span>
                        </button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-flex items-center justify-center gap-2 p-3 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span>Add Pets</span>
                        </button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                <div class="hidden p-4 rounded-lg" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <div class="flex justify-end">
                        <label class="inline-flex items-center me-5 cursor-pointer">
                            <input type="checkbox" value="" class="sr-only peer" id="profile-edit-mode">
                            <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-orange-300 dark:peer-focus:ring-orange-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-orange-500"></div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Edit Mode</span>
                        </label>
                    </div>

                    <div class="grid grid-cols-2 gap-2" id="view">
                        <div id="bio">
                            <h4 class="text-lg font-bold">Bio</h4>
                            {{ $bio != "" ? $bio : "Not Enough Information" }}
                        </div>
                        <div id="gender">
                            <h4 class="text-lg font-bold">Gender</h4>
                            {{ $gender != "" ? $gender : "Not Enough Information" }}

                        </div>
                        <div id="location">
                            <h4 class="text-lg font-bold">Location</h4>
                            {{ $location != "" ? $location : "Not Enough Information" }}

                        </div>
                        <div id="owned-pet-type">
                            <h4 class="text-lg font-bold">Owned Pet Type</h4>
                            @php
                                $myPets = array();
                                foreach (Auth::user()->pet as $curPets){
                                    $curType = strtolower($curPets->type[0]);
                                    if (!in_array($curType, $myPets)){
                                        $myPets[] = $curType;
                                    }
                                }
                                foreach ($myPets as $currPets){
                            @endphp
                                <span class="bg-yellow-100 text-yellow-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ ucfirst($currPets) }}</span>
                            @php
                            }
                            @endphp

                        </div>
                        <div id="no-of-pet">
                            <h4 class="text-lg font-bold">No. of Pet Owned</h4>
                            {{ count(Auth::user()->pet) }}

                        </div>
                        <div id="preferred-pet-service">
                            <h4 class="text-lg font-bold">Preferred Pet Service</h4>
                            @if(empty($preferred_pet_service))
                                No Enough Information
                            @else
                                @foreach($preferred_pet_service as $ps)
                                    <span class="bg-yellow-100 text-yellow-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $ps }}</span>
                                @endforeach
                            @endif

                        </div>
                        <div id="pets-interests">
                            <h4 class="text-lg font-bold">Pet Interest</h4>
                            @if(empty($pet_interest))
                                No Enough Information
                            @else
                                @foreach($pet_interest as $pi)
                                    <span class="bg-yellow-100 text-yellow-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $pi }}</span>
                                @endforeach
                            @endif

                        </div>
                        <div id="preferred-communication">
                            <h4 class="text-lg font-bold">Preferred Communication Channel</h4>
                            @if(empty($preferred_communication))
                                No Enough Information
                            @else
                                @foreach($preferred_communication as $pc)
                                    <span class="bg-yellow-100 text-yellow-800 text-sm font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $pc }}</span>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <form wire:submit="save" class="hidden" id="edit">
                        <div class="grid grid-cols-2 gap-2">
                            <div id="bio" wire:ignore>
                                <h4 class="text-lg font-bold">Bio</h4>
                                <textarea wire:model="bio" id="message" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                            </div>
                            <div id="bio" wire:ignore>
                                <h4 class="text-lg font-bold">Phone</h4>
                                <input wire:model="phone" id="phone" rows="2" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter phone" autocomplete="off"/>
                            </div>
                            <div id="gender" wire:ignore>
                                <h4 class="text-lg font-bold">Gender</h4>
                                <select wire:model="gender" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Choose an option</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Prefer Not to Disclose">Prefer Not to Disclose</option>
                                </select>

                            </div>
                            <div id="location" wire:ignore>
                                <h4 class="text-lg font-bold">Location</h4>
                                <div class="autocomplete-container w-full">
                                    <input wire:model="location" type="text" id="location-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter location" autocomplete="off">
                                    <div id="autocomplete-list" class="autocomplete-items"></div>
                                </div>


                                <style>
                                    .autocomplete-container {
                                        position: relative;
                                        display: inline-block;
                                    }

                                    #location-input {
                                        width: 100%;
                                        padding: 10px;
                                        box-sizing: border-box;
                                    }

                                    .autocomplete-items {
                                        position: absolute;
                                        border: 1px solid #d4d4d4;
                                        border-bottom: none;
                                        border-top: none;
                                        z-index: 99;
                                        top: 100%;
                                        left: 0;
                                        right: 0;
                                        max-height: 200px; /* Optional: limit the height */
                                        overflow-y: auto; /* Optional: add scroll if content exceeds the height */
                                    }

                                    .autocomplete-items div {
                                        padding: 10px;
                                        cursor: pointer;
                                        background-color: #fff;
                                        border-bottom: 1px solid #d4d4d4;
                                    }

                                    .autocomplete-items div:hover {
                                        background-color: #e9e9e9;
                                    }
                                </style>
                            </div>
                            <div id="preferred-pet-service" wire:ignore>
                                <h4 class="text-lg font-bold">Preferred Pet Service</h4>
                                <select wire:model="preferred_pet_service" id="pet-service" class="" multiple="multiple" style="width: 100%;">
                                    @foreach($petService as $service)
                                        <option value="{{ $service }}">{{ $service }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="pets-interests" wire:ignore>
                                <h4 class="text-lg font-bold">Pet Interest</h4>
                                <select wire:model="pet_interest" id="pet-interest" class="" multiple="multiple" style="width: 100%;">
                                    @foreach($petInterestOptions as $options)
                                        <option value="{{ $options }}">{{ $options }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="preferred-communication" wire:ignore>
                                <h4 class="text-lg font-bold">Preferred Communication Channel</h4>
                                <select wire:model="preferred_communication" id="communication" class="" multiple="multiple" style="width: 100%;">
                                    @foreach($comChannel as $com)
                                        <option value="{{ $com }}">{{ $com }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div id="preferred-communication" wire:ignore class="mt-4">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
                        </div>
                    </form>
                </div>

                @if (session()->has('message'))
                    <script>
                        Swal.fire({
                            title: "Good job!",
                            text: "{{ session('message') }}",
                            icon: "success"
                        });
                    </script>
                @endif

                <script>

                    document.addEventListener("DOMContentLoaded", function() {
                        const input = document.getElementById("location-input");
                        const autocompleteList = document.getElementById("autocomplete-list");

                        input.addEventListener("input", function() {
                            const query = this.value;

                            if (!query) {
                                autocompleteList.innerHTML = "";
                                return;
                            }

                            fetch(`https://nominatim.openstreetmap.org/search?q=${query}&format=json&addressdetails=1&limit=5`)
                                .then(response => response.json())
                                .then(data => {
                                    autocompleteList.innerHTML = "";

                                    data.forEach(place => {
                                        const item = document.createElement("div");
                                        item.className = "autocomplete-item"; // Adding a class for styling
                                        item.innerHTML = place.display_name;
                                        item.addEventListener("click", function() {
                                            input.value = place.display_name;
                                            input.dispatchEvent(new Event('input')); // Trigger Livewire update
                                            setTimeout(() => {
                                                autocompleteList.innerHTML = ""; // Hide the suggestions
                                            }, 100); // Small delay to ensure the input event is processed
                                        });

                                        autocompleteList.appendChild(item);
                                    });
                                })
                                .catch(error => console.error('Error fetching location data:', error));
                        });

                        document.addEventListener("click", function(e) {
                            if (!autocompleteList.contains(e.target) && e.target !== input) {
                                autocompleteList.innerHTML = "";
                            }
                        });
                    });

                    $(document).ready(function (){

                        $('#pet-service, #pet-interest, #communication').select2({
                            placeholder: 'Select an option', // Placeholder text
                            allowClear: true,
                        })

                        $('#profile-edit-mode').change(function() {
                            if ($(this).prop('checked')) {
                                $('#edit').removeClass('hidden');
                                $('#view').addClass('hidden');
                            } else {
                                $('#edit').addClass('hidden');
                                $('#view').removeClass('hidden');
                            }
                        });
                    })
                </script>

                @script()
                    <script>
                        $(document).ready(function (){
                            $('#pet-service').on('change', function (){
                                let data = $(this).val();
                                $wire.set('preferred_pet_service', data, false)
                            });

                            $('#pet-interest').on('change', function (){
                                let data = $(this).val();
                                $wire.set('pet_interest', data, false)
                            })

                            $('#communication').on('change', function (){
                                let data = $(this).val();
                                $wire.set('preferred_communication', data, false)
                            })
                        })


                        document.addEventListener('DOMContentLoaded', function () {
                            document.getElementById('remove-photo').addEventListener('click', function () {
                                Swal.fire({
                                    title: "Are you sure?",
                                    text: "You won't be able to revert this!",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Yes, delete it!"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $wire.emit('removePhotoConfirmed');
                                    }
                                });
                            });
                        });

                        $wire.on('photoRemoved', () => {
                            Swal.fire(
                                'Deleted!',
                                'Your photo has been deleted.',
                                'success'
                            );
                        });


                    </script>
                @endscript

                <div class="hidden p-4 rounded-lg" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    cart history will be added here
                </div>
                <div class="hidden p-4 rounded-lg" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                    <div class="flex flex-col">
                        <div class="-m-1.5 overflow-x-auto">
                            <div class="p-1.5 min-w-full inline-block align-middle">
                                <div class="overflow-hidden">
                                    <div class="flex flex-col">
                                        <div class="-m-1.5 overflow-x-auto">
                                            <div class="p-1.5 min-w-full inline-block align-middle">
                                                <div class="border rounded-lg divide-y divide-gray-200">
                                                    <div class="py-3 px-4 flex justify-between items-center">
                                                        <div class="relative max-w-xs">
                                                            <label for="hs-table-search" class="sr-only">Search</label>
                                                            <input type="text" name="hs-table-search" id="hs-table-search" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Search for items">
                                                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                                                <svg class="size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                    <circle cx="11" cy="11" r="8"></circle>
                                                                    <path d="m21 21-4.3-4.3"></path>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                                                Add new Pet
                                                            </button>

                                                            <form wire:submit.prevent="addPet" method="POST" enctype="multipart/form-data" wire:ignore>
                                                                <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                                    Add new pet
                                                                                </h3>
                                                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                                    </svg>
                                                                                    <span class="sr-only">Close modal</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="p-4 md:p-5 space-y-4">
                                                                                <div class="grid grid-cols-3 gap-2">
                                                                                    <div class="col-span-3 grid grid-cols-2 gap-2">
                                                                                        <div class="mb-2" wire:ignore>
                                                                                            <label for="name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                                                            <input wire:model="petName" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Name">
                                                                                        </div>
                                                                                        <div class="mb-2" wire:ignore>
                                                                                            <label for="type" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                                                                            <select wire:model="type" id="type" class="color" multiple="multiple" style="width: 100%">
                                                                                                <option></option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-span-3 grid grid-cols-2 gap-2" wire:ignore>
                                                                                        <div class="mb-2" wire:ignore>
                                                                                            <label for="breed" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Breed Name</label>
                                                                                            <input wire:model="breed" type="text" id="breed" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Breed Name">
                                                                                        </div>
                                                                                        <div class="mb-2" wire:ignore>
                                                                                            <label for="petImage" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Pet Picture</label>
                                                                                            <input wire:model="petImage" accept="image/jpeg, image/png" id="petImage" class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" type="file">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div wire:ignore>
                                                                                        <label for="gender" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                                                                                        <select wire:model="petGender" id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                                                                            <option selected>Choose a Gender</option>
                                                                                            <option value="Male">Male</option>
                                                                                            <option value="Female">Female</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="relative max-w-sm" wire:ignore>
                                                                                        <label for="dob" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                                                                                        <input wire:model="dob" datepicker id="dob" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Date of birth">
                                                                                    </div>
                                                                                    <div wire:ignore>
                                                                                        <label for="color" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Colors</label>
                                                                                        <select wire:model="colors" id="color" class="color" multiple="multiple" style="width: 100%">
                                                                                            <option></option>
                                                                                        </select>
                                                                                    </div>

                                                                                    @script
                                                                                        <script>
                                                                                            $(document).ready(function() {
                                                                                                $('#color').select2({
                                                                                                    placeholder: "Colors...",
                                                                                                    tags: true,
                                                                                                    tokenSeparators: [',', ' '],
                                                                                                    width: '100%'
                                                                                                });
                                                                                                $('#type').select2({
                                                                                                    placeholder: "Pet type...",
                                                                                                    tags: true,
                                                                                                    tokenSeparators: [',', ' '],
                                                                                                    width: '100%'
                                                                                                });
                                                                                            });

                                                                                            $("#type").on('change', function (){
                                                                                                let data = $(this).val();
                                                                                                $wire.set('type', data, false)
                                                                                            })
                                                                                            $("#color").on('change', function (){
                                                                                                let data = $(this).val();
                                                                                                $wire.set('colors', data, false)
                                                                                            })
                                                                                        </script>
                                                                                    @endscript
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                                                <button data-modal-hide="default-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600">Submit</button>
                                                                                <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 ">Cancel</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="overflow-hidden">
                                                        @if($pets)
                                                        <table class="min-w-full divide-y divide-gray-200">
                                                            <thead class="">
                                                                <tr>
                                                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase w-10">#</th>
                                                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase w-10"></th>
                                                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase w-24">Name</th>
                                                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase w-24">Type</th>
                                                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase w-32">Bread Name</th>
                                                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase w-16">Gender</th>
                                                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase w-24">Age (In Human Lifespan)</th>
                                                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase w-24">Color</th>
                                                                    <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase w-20">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="divide-y divide-gray-200">
                                                                @php $i = 1 @endphp
                                                                @foreach($pets as $pet)
                                                                    <tr>
                                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                                            {{ $i }}</td>
                                                                        <td class="whitespace-nowrap text-sm text-gray-800">
                                                                            <img src="{{ asset($pet->image) }}" alt="image" width="300">
                                                                        </td>
                                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            {{ $pet->petName }}</td>
                                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            {{ $pet->type[0] }}</td>
                                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            {{ $pet->breed }}</td>
                                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            {{ $pet->petGender }}</td>
                                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            @php
                                                                                $Born = Carbon::create($pet->dob)->diff(Carbon::now())->format('%y Year, %m Months and %d Days');
                                                                                echo $Born;
                                                                            @endphp
                                                                        </td>
                                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                            @php
                                                                                $len = count($pet->colors);
                                                                                if ($len > 1){
                                                                                    $text = "Combination of ";
                                                                                    foreach ($pet->colors as $clrs){
                                                                                        if (--$len <= 0) {
                                                                                            break;
                                                                                        }
                                                                                        $text .= $clrs.", ";
                                                                                    }
                                                                                    $text .= "and ". $pet->colors[count($pet->colors) - 1];
                                                                                    echo $text;
                                                                                }
                                                                                else{
                                                                                    echo $pet->colors[0];
                                                                                }
                                                                            @endphp
                                                                        </td>
                                                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                                            <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">Delete</button>
                                                                        </td>
                                                                    </tr>
                                                                    @php $i++ @endphp
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
