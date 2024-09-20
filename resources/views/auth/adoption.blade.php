<x-layout title="Adoption | {{ $id->name }}">
    <x-navigation-menu>

        @if(session('success'))

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        title: 'Success!',
                        text: "{{ session('success') }}",
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                });
            </script>

        @endif
        <h1 class="text-2xl font-bold mb-2">Adoption</h1>
        <div class="grid grid-cols-5">
            @foreach($pets as $pet)
                <div class="p-1 border border-black rounded-lg">
                    <div>
                        <img class="rounded-lg" src="{{ asset('storage/'.$pet->image) }}"/>
                    </div>
                    <div class="flex justify-between items-center">
                        <h1 class="text-lg font-bold">{{ $pet->name }}</h1>
                    </div>

                    <h1><span class="font-bold">Age: </span>{{ $pet->age }} years</h1>

                    <div>
                        <h1 class="">
                            <span class="font-bold">Description: </span>
                            @if(isset($pet->description))
                                {{ $pet->description }}
                            @endif
                        </h1>
                    </div>

                    <div>
                        <form action="/ngo/adopt/{{ $pet->id }}" method="post">
                            @csrf
                            <div class="flex justify-end">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Adopt</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </x-navigation-menu>
</x-layout>
