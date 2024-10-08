<x-layout title="Payment">
    <x-navigation-menu>
        <form class="max-w-md mx-auto h-96 flex items-center justify-center p-4" action="/otp" method="POST" style="background-color: #E74694">
            @csrf
            <div>
                <div class="flex items-center justify-center">
                    <img src="{{ asset('/storage/gateway/bkash.png') }}" width="200px">
                </div>
                <h1 class="text-center py-4 text-white">Enter your bkash number</h1>
                <div class="flex items-center">
                    <div id="dropdown-phone-button" data-dropdown-toggle="dropdown-phone" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg" type="button">
                        +880
                    </div>
                    <div class="relative w-full">
                        <input name="phone" type="text" id="phone-input" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-0 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="1778798873" required />
                    </div>
                </div>
                <button type="submit" class="w-full mt-4 flex items-center justify-center gap-3 text-white bg-pink-900 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 hover:cursor-pointer" style="background-color: #751A3D">
                    <span>Continue</span>
                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                    </svg>
                </button>
            </div>
        </form>
    </x-navigation-menu>
</x-layout>
