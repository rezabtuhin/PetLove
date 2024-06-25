<x-layout title="Welcome to PetLove">
    <div class="h-[100vh] w-[100%] bg-color-primary flex items-center justify-center">
        <div class="parent flex flex-col items-center gap-8">
            <div class="image-logo" id="image-logo">
                <img src="{{ asset('/storage/background/bg.png') }}" alt="" width="300">
            </div>
            <div id="onboard-link">
                <a href="{{ route('login') }}" class="uppercase font-black text-2xl text-white p-4 gap-2 bg-[#E5CFB7] w-[240px] border-[4px] border-[#d8b188] flex items-center justify-center">
                    <span>Lets Start</span>
                    <svg class="w-8 h-8 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</x-layout>
