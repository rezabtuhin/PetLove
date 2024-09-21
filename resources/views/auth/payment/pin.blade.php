<x-layout title="OTP">
    <x-navigation-menu>
        <form id="pin-given" method="post" action="/paid" class="max-w-md mx-auto h-96 flex items-center justify-center bg-pink-700 p-4" style="background-color: #E74694">
            @csrf
            <div>
                <div class="flex items-center justify-center">
                    <img src="{{ asset('/storage/gateway/bkash.png') }}" width="200px">
                </div>
                <h1 class="text-center py-4 text-white">Enter your bkash PIN</h1>
                <div class="flex items-center">
                    <div class="relative w-full">
                        <input type="number" id="phone-input" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg" placeholder="Your Pin" required />
                    </div>
                </div>
                <button type="submit" class="w-full mt-4 flex items-center justify-center gap-3 text-white bg-pink-900 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 hover:cursor-pointer" style="background-color: #751A3D">
                    <span>Continue</span>
                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                    </svg>
                </button>
                <p class="text-white text-center">Taka <span class="font-extrabold">{{ $total }}</span> will be deducted from your account</p>
            </div>
        </form>
    </x-navigation-menu>
</x-layout>
