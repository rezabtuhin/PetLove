@props(['id', 'type' => 'text', 'label', 'model'])

<div class="relative w-[70%] xl:w-[50%] lg:w-[50%] md:w-[60%] sm:w-[70%]">
    <input type="{{ $type }}" autocomplete="off" id="{{ $id }}" {{ $attributes->merge(['class' => 'block px-2.5 pb-1.5 pt-3 w-full text-sm text-gray-900 bg-transparent rounded-lg border-[2px] border-gray-800 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-black peer']) }} placeholder=" " />
    <label for="{{ $id }}" class="absolute text-sm text-black dark:text-black duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-black peer-focus:dark:text-blue-500 peer-focus:bg-white peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{ $label }}</label>
    @error($model)
        <span class="text-red-600 text-sm">{{ $message }}</span>
    @enderror
</div>
