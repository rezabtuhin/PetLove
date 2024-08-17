<x-layout title="home">
    <x-navigation-menu>
        <div class="grid grid-cols-3 gap-4">
            <div>
                <a href="" class="flex flex-col items-center">
                    <img src="{{ asset('/storage/background/shop.png') }}" class="w-48 rounded-full bg-white">
                    <span>Shop</span>
                </a>
            </div>
            <div>
                <a href="" class="flex flex-col items-center">
                    <img src="{{ asset('/storage/background/online.jpg') }}" class="w-48 rounded-full bg-white">
                    <span>Online Consultant</span>
                </a>
            </div>
            <div>
                <a href="" class="flex flex-col items-center">
                    <img src="{{ asset('/storage/background/clinic.jpg') }}" class="w-48 rounded-full bg-white">
                    <span>Vet Clinic</span>
                </a>
            </div>
            <div>
                <a href="/missing" class="flex flex-col items-center">
                    <img src="{{ asset('/storage/background/rescue.png') }}" class="w-48 rounded-full bg-white">
                    <span>Missing Pets</span>
                </a>
            </div>
        </div>

    </x-navigation-menu>
</x-layout>
