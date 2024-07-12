<x-layout title="Petlove | Chats">
    <x-navigation-menu>
        @livewire('chat', ['slug' => $slug ?? null])
    </x-navigation-menu>
</x-layout>
