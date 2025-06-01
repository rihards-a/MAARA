<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Lietotājvārds')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('E-pasts')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Parole')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Apstiprināt paroli')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Google Login Button -->
        <div class="mt-4 flex justify-center">
            <a href="{{ route('google.redirect') }}" class="flex items-center bg-white border border-gray-300 rounded-lg px-4 py-2 shadow-md hover:bg-gray-100">
                <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google Logo" class="w-5 h-5 mr-2">
                <span class="text-gray-600 text-sm">{{ __('Turpināt ar Google') }}</span>
            </a>
        </div>

        <!-- Link to Login -->
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Jau esi reģistrējies?') }}
            </a>

        <!-- Register Button -->
            <x-primary-button class="ms-4">
                {{ __('Reģistrēties') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
