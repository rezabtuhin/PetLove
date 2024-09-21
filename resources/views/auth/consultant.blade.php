<x-layout title="Petlove | Consultant">
    <x-navigation-menu>
        @if(count($consultants) > 0)
            @foreach($consultants as $consultant)
                <div class="grid grid-cols-3">
                    <div class="w-full max-w-sm bg-white py-4 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex flex-col items-center pb-10">
                            @if(Auth::user()->oauth_type || Auth::user()->avatar)
                                <img src="{{ asset($consultant->avatar) }}" class="mb-3 rounded-full shadow-lg" style="width: 150px; height: 150px"/>
                            @else
                                <div class="bg-gray-600 flex items-center justify-center w-24 h-24 mb-3 rounded-full shadow-lg">
                                    <p class="text-lg font-black "> {{ $consultant->name[0] }}</p>
                                </div>
                            @endif
                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $consultant->name }}</h5>
                            @if($consultant->additionalInfo->phone)
                                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $consultant->additionalInfo->phone }}</span>
                            @endif
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $consultant->email }}</span>
                            @if($consultant->additionalInfo->bio)
                                <span class="text-sm text-gray-500 dark:text-gray-400 truncate">{{ $consultant->additionalInfo->bio }}</span>
                            @endif
                            <div class="flex mt-4 md:mt-6">
                                <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Message</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            There are no consultant
        @endif
    </x-navigation-menu>
</x-layout>
