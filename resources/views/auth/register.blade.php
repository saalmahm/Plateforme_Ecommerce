<x-guest-layout>
    <div class="flex-shrink-0 flex items-center">
        <a href="{{ route('dashboard') }}" class="text-orange-500 text-xl font-bold">
            ShopEase
        </a>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mt-4">
            <x-input-label for="nom" :value="__('Name')" class="text-orange-500" />
            <x-text-input id="nom" class="block mt-1 w-full border-orange-300 focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50" type="text" name="nom" :value="old('nom')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2 text-orange-500" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-orange-500" />
            <x-text-input id="email" class="block mt-1 w-full border-orange-300 focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-orange-500" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-orange-500" />
            <x-text-input id="password" class="block mt-1 w-full border-orange-300 focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-orange-500" />
        </div>

     
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-orange-500" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full border-orange-300 focus:border-orange-500 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-orange-500" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-orange-600 hover:text-orange-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 bg-orange-500 hover:bg-orange-700 focus:bg-orange-700 active:bg-orange-800 focus:ring-orange-200">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
