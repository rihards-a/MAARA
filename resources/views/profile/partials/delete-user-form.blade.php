<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Dzēst kontu') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Pēc jūsu profila dzēšanas tiks neatgriezeniski dzēsti arī visi ar Jums saistīte dati. Ja vēlaties datus saglabāt, tad lūdzu lejupielādējiet tos pirms konta dzēšanas.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Dzēst kontu') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        @if (Auth::user()->HasGoogleAccount())
        <form method="post" action="{{ route('profile.send-deletion-email') }}" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Vai tiešām vēlaties izdzēst kontu?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Vai tiešām vēlaties dzēst kontu? Pēc saites nospiešanas jūsu konts un visi ar to saistītie dati tiks neatgriezeniski dzēsti.") }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Atcelt') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Nosūtīt konta dzēšanas saiti') }}
                </x-danger-button>
            </div>
        </form>
        @else
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Vai tiešām vēlaties dzēst kontu?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Pēc konta dzēšanas tiks dzēsti visi ar to saistītie dati. Lūdzu atkārtoti ievadiet savu paroli lai neatgriezeniski dzēstu savu kontu.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 focus:outline-none focus:ring-lime-500 focus:border-lime-500"
                    placeholder="{{ __('Parole') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Atcelt') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Dzēst kontu') }}
                </x-danger-button>
            </div>
        </form>
        @endif
    </x-modal>
</section>
