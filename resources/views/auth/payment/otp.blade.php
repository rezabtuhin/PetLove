<x-layout title="OTP">
    <x-navigation-menu>
        <form class="max-w-md mx-auto h-96 flex items-center justify-center bg-pink-700 p-4" action="/pin" method="POST" style="background-color: #E74694">
            @csrf
            <div>
                <div class="flex items-center justify-center">
                    <img src="{{ asset('/storage/gateway/bkash.png') }}" width="200px">
                </div>
                <h1 class="text-center py-4 text-white">Please introduce the 6 digit code we sent to your number.</h1>
                <div class="flex justify-center mb-2 space-x-2 rtl:space-x-reverse">
                    <div>
                        <label for="code-1" class="sr-only">First code</label>
                        <input type="text" maxlength="1" data-focus-input-init data-focus-input-next="code-2" id="code" class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required />
                    </div>
                    <div>
                        <label for="code-2" class="sr-only">Second code</label>
                        <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-1" data-focus-input-next="code-3" id="code" class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required />
                    </div>
                    <div>
                        <label for="code-3" class="sr-only">Third code</label>
                        <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-2" data-focus-input-next="code-4" id="code" class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required />
                    </div>
                    <div>
                        <label for="code-4" class="sr-only">Fourth code</label>
                        <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-3" data-focus-input-next="code-5" id="code" class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required />
                    </div>
                    <div>
                        <label for="code-5" class="sr-only">Fifth code</label>
                        <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-4" data-focus-input-next="code-6" id="code" class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required />
                    </div>
                    <div>
                        <label for="code-6" class="sr-only">Sixth code</label>
                        <input type="text" maxlength="1" data-focus-input-init data-focus-input-prev="code-5" id="code" class="block w-9 h-9 py-3 text-sm font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required />
                    </div>
                </div>

                <button type="submit" class="w-full mt-4 flex items-center justify-center gap-3 text-white bg-pink-900 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 hover:cursor-pointer" style="background-color: #751A3D">
                    <span>Continue</span>
                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                    </svg>
                </button>
            </div>
        </form>

        <style>
            #code{
                max-width: 50px !important;
            }
        </style>
    </x-navigation-menu>
</x-layout>
