<x-layout title="home">
    <x-navigation-menu>

        @foreach($users as $user)
            {{ $user->name }} <a href="{{ route('start-chat', $user->id) }}" class="font-bold text-blue-600">Send Message</a>
        @endforeach

    </x-navigation-menu>
</x-layout>
