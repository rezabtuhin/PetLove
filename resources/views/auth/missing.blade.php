<x-layout title="Missing Pets">
    <x-navigation-menu>
        <h1 class="flex flex-col text-center gap-4">
            <span class="font-extrabold text-3xl">Help to find them!</span>
            <span>This little souls have lost their home , help them find their home</span>
        </h1>

        <h1 class="text-3xl text-center mt-10">Missing</h1>

        <div class="modal">
            <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="ms-auto block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                List one!
            </button>
            <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Add Missing Pet
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="p-4 md:p-5 space-y-4">
                            <form action="/missing/create" method="POST" enctype="multipart/form-data">
                                @CSRF
                                @method('POST')
                                <div class="grid gap-6 mb-6 md:grid-cols-2">
                                    <div>
                                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Puskas" required />
                                    </div>
                                    <div>
                                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                        <input type="text" id="Description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Description" required />
                                    </div>
                                    <div>
                                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Missing Since</label>
                                        <div class="relative max-w-sm">
                                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                </svg>
                                            </div>
                                            <input datepicker id="default-datepicker" name="missing_since" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                        </div>

                                    </div>
                                    <div>
                                        <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                                        <input type="text" id="company" name="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Location" required />
                                    </div>
                                    <div>
                                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Number</label>
                                        <input type="text" id="phone" name="contact_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="018xxxxxxxx" required />
                                    </div>
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Image</label>
                                        <input name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                                    </div>
                                </div>
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-4 grid-cols-2 gap-4">


            @foreach($missings as $missing)


                <div class="max-w-sm dark:bg-gray-800 dark:border-gray-700">

                    <img class="" src="{{ asset($missing->image) }}" alt="" width="100%"/>
                    <div class="bg-white p-3">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $missing->name }}</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Location: <span class="font-bold">{{ $missing->location }}</span></p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Missing since: <span class="font-bold">{{ $missing->missing_since }}</span></p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Contact: <span class="font-bold">{{ $missing->contact_number }}</span></p>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Description: <span class="font-bold">{{ $missing->description }}</span></p>
                    </div>

                </div>

            @endforeach
        </div>
    </x-navigation-menu>
</x-layout>
