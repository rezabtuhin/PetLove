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
                    <a class="text-blue-500 hover:underline text-[17px] font-bold " href="mailto:+8801223344553">+8801223344553</a>
                </span>
                <div class="mt-7">
                    <form>
                        <div class="flex items-center gap-11">
                            <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white" for="small_size">Change picture</label>
                            <button type="button" class="py-2 px-4 mb-1 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Upload</button>
                        </div>
                        <input class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="small_size" type="file">
                    </form>
                </div>
            </div>
        </div>

        <div class="information">
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
                            {{ $infoExists ? "Yes" : "No Enough Information" }}
                        </div>
                        <div id="gender">
                            <h4 class="text-lg font-bold">Gender</h4>
                            {{ $infoExists ? "Yes" : "No Enough Information" }}

                        </div>
                        <div id="location">
                            <h4 class="text-lg font-bold">Location</h4>
                            {{ $infoExists ? "Yes" : "No Enough Information" }}

                        </div>
                        <div id="owned-pet-type">
                            <h4 class="text-lg font-bold">Owned Pet Type</h4>
                            {{ $infoExists ? "Yes" : "No Enough Information" }}

                        </div>
                        <div id="no-of-pet">
                            <h4 class="text-lg font-bold">No. of Pet Owned</h4>
                            {{ $infoExists ? "Yes" : "No Enough Information" }}

                        </div>
                        <div id="preferred-pet-service">
                            <h4 class="text-lg font-bold">Preferred Pet Service</h4>
                            {{ $infoExists ? "Yes" : "No Enough Information" }}

                        </div>
                        <div id="pets-interests">
                            <h4 class="text-lg font-bold">Pet Interest</h4>
                            {{ $infoExists ? "Yes" : "No Enough Information" }}

                        </div>
                        <div id="preferred-communication">
                            <h4 class="text-lg font-bold">Preferred Communication Channel</h4>
                            {{ $infoExists ? "Yes" : "No Enough Information" }}

                        </div>
                    </div>
                    <form wire:submit="save" class="hidden" id="edit">
                        <div class="grid grid-cols-2 gap-2">
                            <div id="bio" wire:ignore>
                                <h4 class="text-lg font-bold">Bio</h4>
                                <textarea wire:model="bio" id="message" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
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

                            <div id="preferred-communication" wire:ignore>
                                <button wire:click="save">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

                <script>
                    $(document).ready(function (){

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
                                            item.innerHTML = place.display_name;
                                            item.addEventListener("click", function() {
                                                input.value = place.display_name;
                                                autocompleteList.innerHTML = "";
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

                    </script>
                @endscript

                <div class="hidden p-4 rounded-lg" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>
                <div class="hidden p-4 rounded-lg" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>
            </div>

        </div>
    </div>
</div>
