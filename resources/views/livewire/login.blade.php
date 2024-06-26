<div class="flex">
    <div class="h-[100vh] w-[50%] bg-color-primary hidden items-center justify-center xl:flex lg:flex md:flex sm:hidden">
        <img src="{{ asset('/storage/background/bg.png') }}" alt="" class="max-w-[300px]">
    </div>
    <div class="h-[100vh] w-[100%] xl:w-[50%] lg:w-[50%] md:w-[50%] sm:w-[100%] bg-color-secondary flex items-center justify-center overflow-auto overflow-y-scroll">
        <div class="flex flex-col items-center gap-3 w-[100%]">
            <div class="flex items-center justify-center xl:hidden lg:hidden md:hidden sm:flex bg-color-primary mb-7 w-[120px] h-[120px] rounded-[50%]">
                <img src="{{ asset('/storage/background/bg.png') }}" alt="" class="max-w-[80px]">
            </div>

            <h1 class="text-left font-black text-2xl">Login to your Account</h1>

            <form wire:submit.prevent="login" class="w-full flex flex-col items-center gap-3">
                @CSRF
                <x-input-field wire:model.defer="email" model="email" id="input-fields" type="email" label="Email" required/>
                <x-input-field wire:model.defer="password" model="password" id="input-fields" type="password" label="Password" required/>

                <div class="w-[70%] xl:w-[50%] lg:w-[50%] md:w-[60%] sm:w-[70%]">
                    <a href="" class="text-blue-600 font-bold text-sm hover:underline">Forgot Password?</a>
                </div>
                <div class="flex w-[70%] xl:w-[50%] lg:w-[50%] md:w-[60%] sm:w-[70%] mt-3">
                    <button type="submit" class="w-full text-black bg-[#e2f0ec] hover:bg-[#dce5e2] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</button>
                </div>
            </form>
            <x-divider />

            <div class="w-[70%] xl:w-[50%] lg:w-[50%] md:w-[60%] sm:w-[70%] mt-3">
                <x-social-button color="#3b5998" label="Sign in with Facebook" icon="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" />
                <x-social-button color="#4285F4" label="Sign in with Google" icon="M8.842 18.083a8.8 8.8 0 0 1-8.65-8.948 8.841 8.841 0 0 1 8.8-8.652h.153a8.464 8.464 0 0 1 5.7 2.257l-2.193 2.038A5.27 5.27 0 0 0 9.09 3.4a5.882 5.882 0 0 0-.2 11.76h.124a5.091 5.091 0 0 0 5.248-4.057L14.3 11H9V8h8.34c.066.543.095 1.09.088 1.636-.086 5.053-3.463 8.449-8.4 8.449l-.186-.002Z" />
                <div class="w-full text-center">
                    <a href="{{ route('register') }}" class="text-blue-600 font-bold text-sm hover:underline">Not a member?</a>
                </div>
            </div>



        </div>
    </div>
</div>
