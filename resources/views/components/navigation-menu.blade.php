<div>
    <nav class="bg-[#f2dac4] fixed top-0 z-50 w-full dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                    <a href="https://flowbite.com" class="flex ms-2 md:me-24">
                        <div class="flex items-center justify-center bg-color-primary w-[70px] h-[70px] me-3 rounded-[50%]">
                            <img src="{{ asset('/storage/background/bg.png') }}" alt="" class="max-w-[40px]">
                        </div>
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">PetCare</span>
                    </a>
                </div>
                <div class="flex items-center gap-5">


                    <button type="button" class="relative inline-flex items-center p-3 text-sm font-medium text-center text-white bg-[#E6BEAE] rounded-lg hover:bg-[#EEE4E1]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-6 text-gray-800">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <span class="sr-only">Notifications</span>
                        <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-black border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">20</div>
                    </button>


                    <div class="flex items-center ">
                        <div class="flex items-center gap-2">
                            <div class="flex items-center gap-2">
                                <div type="button" class="flex text-sm bg-gray-800 rounded-full" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                    <span class="sr-only">Open user menu</span>
                                    @if(Auth::user()->oauth_type)
                                        <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->avatar }}" alt="user photo">
                                    @else
                                        @if(Auth::user()->avatar)
                                            <img class="w-10 h-10 rounded-full" src="{{ asset(Auth::user()->avatar) }}" alt="user photo">
                                        @else
                                            @php
                                                $colors = [
                                                    'bg-red-500',
                                                    'bg-blue-500',
                                                    'bg-green-500',
                                                    'bg-yellow-500',
                                                    'bg-purple-500',
                                                    'bg-pink-500',
                                                    'bg-indigo-500',
                                                    'bg-teal-500',
                                                    'bg-orange-500',
                                                ];

                                                $randomColor = $colors[array_rand($colors)];
                                            @endphp
                                            <div class="{{ $randomColor }} w-10 h-10 rounded-full flex items-center justify-center">
                                                <p class="text-lg font-black ">{{ Auth::user()->name[0] }}</p>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                <p class="font-bold text-gray-700">{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                    </div>

                    <form class="" action="{{ route('logout') }}">
                        <button type="submit" class="flex items-center gap-2 p-2 px-3 bg-[#E6BEAE] text-white rounded-md hover:bg-[#EEE4E1] transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-6 font-bold text-gray-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                            </svg>
                            <p class="font-bold text-gray-800">Logout</p>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar" class="bg-[#f2dac4] fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full border-r
     sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-hidden dark:bg-gray-800 mt-8 bg-[#f2dac4]">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('chats') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>
                        <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg bg-[#ffcec1] mt-24 overflow-hidden overflow-y-auto flex flex-col" style="height: calc(100vh - 130px);">


            <div class="flex-grow">
                {{ $slot }}
            </div>

            <footer class="bg-[#FFD1C1] p-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2">
                        <span class="text-black">Contact us</span>
                        <a href="tel:+1234567890" class="text-black">
                            <img aria-hidden="true" alt="phone" src="https://openui.fly.dev/openui/24x24.svg?text=📞" />
                        </a>
                        <a href="mailto:example@example.com" class="text-black">
                            <img aria-hidden="true" alt="email" src="https://openui.fly.dev/openui/24x24.svg?text=✉️" />
                        </a>
                    </div>
{{--                    <img src="{{ asset('/storage/background/footer.png') }}" alt="" srcset="">--}}
                    <div class="flex items-center space-x-4">
                        <a href="https://facebook.com" target="_blank" class="text-black">
                            <img aria-hidden="true" alt="facebook" src="https://openui.fly.dev/openui/24x24.svg?text=📘" />
                        </a>
                        <a href="https://instagram.com" target="_blank" class="text-black">
                            <img aria-hidden="true" alt="instagram" src="https://openui.fly.dev/openui/24x24.svg?text=📸" />
                        </a>
                        <a href="https://twitter.com" target="_blank" class="text-black">
                            <img aria-hidden="true" alt="twitter" src="https://openui.fly.dev/openui/24x24.svg?text=🐦" />
                        </a>
                    </div>
                </div>
{{--                <div class="mt-4 h-4 bg-[#5A2D2C] rounded-t-full"></div>--}}
            </footer>

        </div>
    </div>
</div>
