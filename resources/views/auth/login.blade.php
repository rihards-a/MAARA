<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('E-pasts')" />
            <x-text-input id="email" class="block mt-1 w-full focus:outline-none focus:ring-lime-500 focus:border-lime-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Parole')" />

            <x-text-input id="password" class="block mt-1 w-full focus:outline-none focus:ring-lime-500 focus:border-lime-500"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-lime-600 shadow-sm focus:ring-lime-500 focus:border-lime-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Atcerēties mani') }}</span>
            </label>
        </div>

        <!-- Google Login Button -->
        <div class="mt-4 flex justify-center">
            <a href="{{ route('google.redirect') }}" class="flex items-center bg-white border border-gray-300 rounded-lg px-4 py-2 shadow-md hover:bg-gray-100">
                <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google Logo" class="w-5 h-5 mr-2">
                <span class="text-gray-600 text-sm">{{ __('Turpināt ar Google') }}</span>
            </a>
        </div>

        <!-- Forgot Password -->
        <div class="flex items-center justify-end mt-4 gap-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500" href="{{ route('password.request') }}">
                    {{ __('Aizmirsi savu paroli?') }}
                </a>
            @endif

        <!-- Register Link -->
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500" href="{{ route('why_register') }}">
                {{ __('Neesi reģistrējies?') }}
            </a>

            <x-primary-button class="ms-3">
                {{ __('Pierakstīties') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
