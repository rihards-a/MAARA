
@extends('layouts.app_layout_with_navbar')

@section('main_content')
    <div class="py-12 bg-gray-50"> {{-- Using a very light gray background for the overall page content area for softness and contrast --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Display User Information Here --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg"> {{-- Added a moss border for subtle emphasis --}}
                <div class="max-w-xl">
                    <h3 class="text-lg font-semibold text-moss mb-4">Lietotāja informācija</h3> {{-- Using your custom 'moss' color for the heading with some bottom margin --}}
                    <p class="text-gray-700"><strong class="text-moss">Lietotājvārds:</strong> {{ Auth::user()->name }}</p> {{-- Bolded labels with moss color --}}
                    <p class="text-gray-700"><strong class="text-moss">E-pasts:</strong> {{ Auth::user()->email }}</p>
                    <p class="text-gray-700">
                        <strong class="text-moss">Veikta apmaksa par plānošanas rīku:</strong> 
                        {{ Auth::user()->hasLifetime() ? 'Jā' : 'Nē' }}
                    </p>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                 </div>
            </div>

            @if (!Auth::user()->HasGoogleAccount())
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            @endif

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection {{-- End of the content section --}}