@extends('layouts.app_layout_with_navbar')

@section('title', 'Apbedīšanas izvēles')

@section('main_content')
@include('components.mini-tab-navbar')
<section class="welcome-section">
    <br>
    <h1 class="welcome-title px-8">Aizpildiet sev svarīgos laukus</h1>
    <p class="welcome-text text-sm p-8">
    Bēru organizēšana mēdz kļūt par galveno praktisko diskusiju objektu palicēju starpā. Pētījumi rāda, ka pat visaptuvenākās norādes no aizgājēja ļauj tuviniekiem justies labāk par šī atvadīšanās rituāla norisi (protams, kamēr vien šīs vēlmes ir īstenojamas, ņemot vērā materiālās un praktiskās iespējas).
    Šajā sadaļā īpaši iesakām aizpildīt divus ''atvērtos'' laukus - par lietām, kas Tev ir īpaši svarīgas (gan no vēlamās, gan nevēlamās puses). Papildus, esam pievienojuši iespēju norādīt arī sīkākas detaļas, ja esi gatavs par tām šobrīd aizdomāties. Arī vēlme neatvadīties bēru ceremonijas formātā ir saprotama personīgā izvēle, ko vari šeit aprakstīt.
    <br>
    </p>
    <form action="{{ route('dashboard.beres.save') }}" method="POST" class="bg-white shadow-md rounded-lg p-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @csrf
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-1" for="important_details">
                Apraksti sev svarīgākās bēru detaļas*:
            </label>
            <textarea name="responses[1][response_value]" id="important_details" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-4 p-9" placeholder="Vissvarīgāk man ir, lai...">{{ $responses[1] ?? '' }}</textarea>
            <input type="hidden" name="responses[1][question_id]" value="1">
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-1" for="not_wanted">
                Ko Tu noteikti negribētu savās bērēs?*
            </label>
            <textarea name="responses[2][response_value]" id="not_wanted" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-9" placeholder="Es noteikti negribētu, lai...">{{ $responses[2] ?? '' }}</textarea>
            <input type="hidden" name="responses[2][question_id]" value="2">
        </div>
    
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-1" for="burial_preference">
                Apglabāšanas preference:
            </label>
            <select name="responses[3][response_value]" id="burial_preference" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3">
                <option disabled {{ empty($responses[3]) ? 'selected' : '' }} value="">Izvēlēties</option>    
                <option value="kremācija" {{ ($responses[3] ?? '') == 'kremācija' ? 'selected' : '' }}>Kremācija</option>
                <option value="apglabāšana" {{ ($responses[3] ?? '') == 'apglabāšana' ? 'selected' : '' }}>Apglabāšana</option>
                <option value="ķermeņa ziedošana zinātnei" {{ ($responses[3] ?? '') == 'ķermeņa ziedošana zinātnei' ? 'selected' : '' }}>Ķermeņa ziedošana zinātnei</option>
                <option value="cits" {{ ($responses[3] ?? '') == 'cits' ? 'selected' : '' }}>Cits (norādīt sadaļā ''Atdusas vieta'')</option>
            </select>
            <input type="hidden" name="responses[3][question_id]" value="3">
        </div>
    
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-1" for="resting_place">
                Norādes par atdusas vietu:
            </label>
            <textarea name="responses[4][response_value]" id="resting_place" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-4" placeholder="Šeit norādi konkrētu atdusas vietu, ja tāda ir (pelnu izkaisīšanas lokāciju vai/un kapsētu)">{{ $responses[4] ?? '' }}</textarea>
            <input type="hidden" name="responses[4][question_id]" value="4">
        </div>
    
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-1" for="eulogy">
                Bēru runa:
            </label>
            <textarea name="responses[5][response_value]" id="eulogy" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-4" placeholder="Vēlamais autors un aptuvenais saturs, ja Tev ir konkrētas vēlmes">{{ $responses[5] ?? '' }}</textarea>
            <input type="hidden" name="responses[5][question_id]" value="5">
        </div>
    
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-1" for="music">
                Mūzikas izvēle:
            </label>
            <textarea name="responses[6][response_value]" id="music" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-4" placeholder="Vai ir kāda dziesma, konkrēti mūzikas instrumenti vai žanrs, ko Tu izvēlētos savām bērēm?">{{ $responses[6] ?? '' }}</textarea>
            <input type="hidden" name="responses[6][question_id]" value="6">
        </div>
    
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-1" for="farewell_location">
                Atvadīšanās lokācija:
            </label>
            <textarea name="responses[7][response_value]" id="farewell_location" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-4" placeholder=" Bēru ceremonijas norises vieta">{{ $responses[7] ?? '' }}</textarea>
            <input type="hidden" name="responses[7][question_id]" value="7">
        </div>
    
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-1" for="overall_mood">
                Kopējā noskaņa:
            </label>
            <textarea name="responses[8][response_value]" id="overall_mood" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-4" placeholder="Apraksti sevis iztēloto noskaņu ar īpašības vārdiem (piemēram, ''gaiša'', ''apcerīga'', ''piezemēta'', u.c.)">{{ $responses[8] ?? '' }}</textarea>
            <input type="hidden" name="responses[8][question_id]" value="8">
        </div>
    
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-1" for="guests">
                Uzaicinātie viesi:
            </label>
            <textarea name="responses[9][response_value]" id="guests" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-4" placeholder="Vai vēlies visiem pieejamu vai ļoti privātu atvadīšanos?">{{ $responses[9] ?? '' }}</textarea>
            <input type="hidden" name="responses[9][question_id]" value="9">
        </div>
    
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-1" for="ritual_items">
                Rituālie priekšmeti (zārks, urna, statuja, u.c.):
            </label>
            <textarea name="responses[10][response_value]" id="ritual_items" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-4" placeholder=" Apraksti savas vēlmes saistībā ar tradicionālo apbedīšanas priekšmetu noformējumu, ja tādas ir">{{ $responses[10] ?? '' }}</textarea>
            <input type="hidden" name="responses[10][question_id]" value="10">
        </div>
    
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-1" for="flowers">
                Ziedu izvēle:
            </label>
            <textarea name="responses[11][response_value]" id="flowers" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-4" placeholder="Ja Tev ir ziedu preferences, norādi tās šeit">{{ $responses[11] ?? '' }}</textarea>
            <input type="hidden" name="responses[11][question_id]" value="11">
        </div>
        
        <div>
            <label class="block text-gray-700 text-sm font-semibold mb-1" for="advisors">
                Organizatori vai padomdevēji:
            </label>
            <textarea name="responses[12][response_value]" id="advisors" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-4" placeholder="Vai ir kāds tuvinieks(--i), uz kuru izvēlēm un darbībām Tu īpaši paļaujies?">{{ $responses[12] ?? '' }}</textarea>
            <input type="hidden" name="responses[12][question_id]" value="12">
        </div>
        
        <div class="col-span-full flex justify-between items-center mt-6 w-full">
            <!-- Left minimal button -->
            <a href="{{ route('dashboard.pensija') }}"
            class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                Atpakaļ
            </a>

            <!-- Center save button -->
            <button type="submit"
                class="bg-moss hover:bg-green-700 text-white font-bold py-3 px-6 rounded-md focus:outline-none focus:shadow-outline">
                Saglabāt
            </button>

            <!-- Right minimal button -->
            <a href="{{ route('dashboard.finanses') }}"
            class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                Tālāk
            </a>
        </div>
    </form>
</section>
@endsection
