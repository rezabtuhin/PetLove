@props(['color', 'label', 'icon', 'href', 'provider'])

<a href="{{ route($href, ['provider' => $provider]) }}" {{ $attributes->merge(['class' => "w-full flex items-center justify-center text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"]) }} style="background-color: {{ $color }};">
    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 19">
        <path fill-rule="evenodd" d="{{ $icon }}" clip-rule="evenodd"/>
    </svg>
    <span>{{ $label }}</span>
</a>
