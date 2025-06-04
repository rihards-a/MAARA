@extends('layouts.app_layout_with_navbar')

@section('title', 'Digitālais mantojums')

@section('main_content')

@include('components.mini-tab-navbar')
<section class="welcome-section">
    <br>
    <p class="welcome-text text-sm">
    Digitālais mantojums 
    </p>
    <br>



    <!-- Navigation Buttons -->
        <div class="w-full max-w-screen-lg mx-auto px-4 py-6 flex justify-between items-center">
            <a href="{{ route('dashboard.testaments') }}"
            class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                Atpakaļ
            </a>

            <div class="flex items-center gap-4">
                <label class="flex items-center gap-2 text-gray-700 text-sm font-medium cursor-pointer select-none">
                    <input type="checkbox"
                        id="section_completed"
                        name="responses[13][response_value]"
                        value="1"
                        class="form-checkbox h-5 w-5 text-lime-600 rounded focus:ring-lime-500"
                        {{ (isset($responses[13]['response_value']) && $responses[13]['response_value'] == 1) ? 'checked' : '' }}>
                    Atzīmēt sadaļu kā pabeigtu
                </label>

                <button type="submit"
                        class="bg-moss hover:bg-lime-600 text-white font-bold py-3 px-6 rounded-md focus:outline-none">
                    Saglabāt
                </button>

                <a href="{{ route('dashboard.pienakumi') }}"
                class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                    Tālāk
                </a>
            </div>
        </div>
</section>
@endsection