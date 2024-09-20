<x-layout title="NGOs">
    <x-navigation-menu>
        <div class="grid grid-cols-5">
            @foreach($ngos as $ngo)
                <a href="/ngo/{{ $ngo->id  }}">
                    <div class="p-1 border border-black rounded-lg">
                        <div>
                            <img class="rounded-lg" src="{{ $ngo->avatar }}"/>
                        </div>
                        <div class="flex justify-between items-center">
                            <h1 class="text-lg font-bold">{{ $ngo->name }}</h1>
                        </div>

                        <div>
                            <h1 class="truncate text-[13px]">
                                @if(isset($ngo->additionalInfo->bio))
                                    {{ $ngo->additionalInfo->bio }}
                                @endif
                            </h1>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </x-navigation-menu>
</x-layout>
