<x-layout title="Clincs">
    <x-navigation-menu>
        <div class="grid grid-cols-5">
            @foreach($clinics as $clinic)
                <a href="/clinic/{{ $clinic->id  }}">
                    <div class="p-1 border border-black rounded-lg">
                        <div>
                            <img class="rounded-lg" src="{{ $clinic->avatar }}"/>
                        </div>
                        <div class="flex justify-between items-center">
                            <h1 class="text-lg font-bold">{{ $clinic->name }}</h1>
                            <h1 class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#ffa534" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                </svg>
                                @if(isset($clinic->reviewsReceived->first()->average_rating))
                                    {{ number_format($clinic->reviewsReceived->first()->average_rating, 1) }}
                                @else
                                    {{ 'No Review Found' }}
                                @endif
                            </h1>
                        </div>

                        <div>
                            <h1 class="truncate text-[13px]">{{ $clinic->additionalInfo->bio }}</h1>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </x-navigation-menu>
</x-layout>
