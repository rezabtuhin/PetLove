<div class="grid grid-cols-5">
    @foreach($clinics as $clinic)
        <div class="p-1 border border-black rounded-lg">
            <div>
                <img class="rounded-lg" src="{{ $clinic->avatar }}"/>
            </div>
            <div>
                <h1 class="text-lg font-bold">{{ $clinic->name }}</h1>
            </div>
        </div>
    @endforeach
</div>
