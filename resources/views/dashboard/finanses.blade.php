@extends('layouts.app_layout_with_navbar')

@section('title', 'Finanšu pārvaldība')

@section('main_content')

@include('components.mini-tab-navbar')
<section class="welcome-section">
    <br>
    <h1 class="welcome-title px-8">Aizpildiet sev svarīgos laukus</h1>
    <p class="welcome-text text-sm p-8">
    Aizpildi šo sadaļu, lai ērti uzskaitītu finanšu instrumentus, par kuriem Taviem tuviniekiem būtu jāzina. Balstoties uz Tavām atbildēm, Tavā plānošanas dokumenta lejuplādējamā PDF failā tiks izveidoti lauki, ko, ja vēlēsies, aizpildīsi pats ārpus mūsu sistēmas (drošības apsvērumu dēļ). Esi apdomīgs ar informācijas norādīšanu un uzglabāšanu: galvenokārt šī sadaļa paredzēta tam, lai Tavi tuvinieki būtu informēti par Tev piederošajiem resursiem, kurus notārs mantas apzināšanas procesā var arī neatrast (un tādējādi tie netiktu nodoti tuviniekiem)<br>
    <br>
    Par to, kā Taviem tuviniekiem pēcāk piekļūt finansēm un mantām, ko nepārvaldīs notārs Latvijā, vairāk uzzini nākamajā sadaļā (''Mantojuma sagatavošana'').
    </p>
    <form action="{{ route('dashboard.finanses.save') }}" method="POST" class="bg-white p-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @csrf
    
    <div class="mb-6"> {{-- Added margin-bottom for separation between questions --}}
    <label class="block text-gray-700 text-sm font-semibold mb-2" for="finances_online_tools_question">
        Vai Tu glabā naudu kādā no šiem finanšu rīkiem? 
    </label>

    @php
        // Get previously selected values for Question 100
        $selectedOnlineFinances = isset($responses[100]) && is_array($responses[100])
            ? $responses[100]
            : [];
    @endphp

    <div class="space-y-2">
        <div class="flex items-center">
            <input type="checkbox"
                   name="responses[100][response_value][]" {{-- Correct name for Q100 checkboxes --}}
                   id="finances_online_paypal" {{-- Unique ID --}}
                   value="paypal" {{-- Descriptive value --}}
                   class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                   {{ in_array('paypal', $selectedOnlineFinances) ? 'checked' : '' }}>
            <label for="finances_online_paypal" class="ml-2 text-gray-700">Paypal</label>
        </div>

        <div class="flex items-center">
            <input type="checkbox"
                   name="responses[100][response_value][]"
                   id="finances_online_revolut"
                   value="revolut"
                   class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                   {{ in_array('revolut', $selectedOnlineFinances) ? 'checked' : '' }}>
            <label for="finances_online_revolut" class="ml-2 text-gray-700">Revolut</label>
        </div>

        <div class="flex items-center">
            <input type="checkbox"
                   name="responses[100][response_value][]"
                   id="finances_online_other"
                   value="other" {{-- 'cits' for 'other' --}}
                   class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                   {{ in_array('other', $selectedOnlineFinances) ? 'checked' : '' }}>
            <label for="finances_online_other" class="ml-2 text-gray-700">Cits</label>
        </div>

        <div class="flex items-center">
            <input type="checkbox"
                   name="responses[100][response_value][]"
                   id="finances_online_none"
                   value="none" {{-- 'neglabaju' for 'none' --}}
                   class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                   {{ in_array('none', $selectedOnlineFinances) ? 'checked' : '' }}>
            <label for="finances_online_none" class="ml-2 text-gray-700">Neglabāju</label>
        </div>
    </div>

    {{-- Hidden input for this specific question's ID --}}
    <input type="hidden" name="responses[100][question_id]" value="100">
</div>
<div class="mb-6"> {{-- Added margin-bottom for separation between questions --}}
    <label class="block text-gray-700 text-sm font-semibold mb-2" for="finances_banks_question">
        Kurās bankās Tev ir atvērti konti? 
    </label>

    @php
        // Get previously selected values for Question 101 (assuming this is its ID)
        $selectedBanks = isset($responses[101]) && is_array($responses[101])
            ? $responses[101]
            : [];
    @endphp

    <div class="space-y-2">
        <div class="flex items-center">
            <input type="checkbox"
                   name="responses[101][response_value][]" {{-- Correct name for Q101 checkboxes --}}
                   id="finances_bank_swedbank" {{-- Unique ID --}}
                   value="swedbank" {{-- Descriptive value --}}
                   class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                   {{ in_array('swedbank', $selectedBanks) ? 'checked' : '' }}>
            <label for="finances_bank_swedbank" class="ml-2 text-gray-700">Swedbank</label>
        </div>

        <div class="flex items-center">
            <input type="checkbox"
                   name="responses[101][response_value][]"
                   id="finances_bank_seb"
                   value="seb"
                   class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                   {{ in_array('seb', $selectedBanks) ? 'checked' : '' }}>
            <label for="finances_bank_seb" class="ml-2 text-gray-700">SEB</label>
        </div>

        <div class="flex items-center">
            <input type="checkbox"
                   name="responses[101][response_value][]"
                   id="finances_bank_luminor"
                   value="luminor"
                   class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                   {{ in_array('luminor', $selectedBanks) ? 'checked' : '' }}>
            <label for="finances_bank_luminor" class="ml-2 text-gray-700">Luminor</label>
        </div>

        <div class="flex items-center">
            <input type="checkbox"
                   name="responses[101][response_value][]"
                   id="finances_bank_citadele"
                   value="citadele"
                   class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                   {{ in_array('citadele', $selectedBanks) ? 'checked' : '' }}>
            <label for="finances_bank_citadele" class="ml-2 text-gray-700">Citadele</label>
        </div>

        <div class="flex items-center">
            <input type="checkbox"
                   name="responses[101][response_value][]"
                   id="finances_bank_indexo"
                   value="indexo"
                   class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                   {{ in_array('indexo', $selectedBanks) ? 'checked' : '' }}>
            <label for="finances_bank_indexo" class="ml-2 text-gray-700">Indexo</label>
        </div>

        <div class="flex items-center">
            <input type="checkbox"
                   name="responses[101][response_value][]"
                   id="finances_bank_lv_other"
                   value="otherLV"
                   class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                   {{ in_array('otherLV', $selectedBanks) ? 'checked' : '' }}>
            <label for="finances_bank_lv_other" class="ml-2 text-gray-700">Cita banka Latvijā</label>
        </div>

        <div class="flex items-center">
            <input type="checkbox"
                   name="responses[101][response_value][]"
                   id="finances_bank_foreign_other"
                   value="otherForeign"
                   class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                   {{ in_array('otherForeign', $selectedBanks) ? 'checked' : '' }}>
            <label for="finances_bank_foreign_other" class="ml-2 text-gray-700">Cita banka ārzemēs</label>
        </div>
    </div>

    {{-- Hidden input for this specific question's ID --}}
    <input type="hidden" name="responses[101][question_id]" value="101">
</div>
<div class="mb-6"> {{-- Added margin-bottom for separation between questions --}}
    <label class="block text-gray-700 text-sm font-semibold mb-2" for="finances_banks_question">
        Vai Tev pieder kāda uzņēmuma akcijas? 
    </label>

    @php
        // Get previously selected values for Question 102 (assuming this is its ID)
        $selectedBanks = isset($responses[102]) && is_array($responses[102])
            ? $responses[102]
            : [];
    @endphp

    <div class="space-y-2">
        <div class="flex items-center">
            <input type="radio"
                   name="responses[102][response_value][]" {{-- Correct name for Q101 checkboxes --}}
                   id="finances_stock_yes" {{-- Unique ID --}}
                   value="yes" {{-- Descriptive value --}}
                   class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                   {{ in_array('yes', $selectedBanks) ? 'checked' : '' }}>
            <label for="finances_stock_yes" class="ml-2 text-gray-700">Jā</label>
        </div>
        <div class="flex items-center">
            <input type="radio"
                   name="responses[102][response_value][]" {{-- Correct name for Q101 checkboxes --}}
                   id="finances_stock_no" {{-- Unique ID --}}
                   value="no" {{-- Descriptive value --}}
                   class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                   {{ in_array('no', $selectedBanks) ? 'checked' : '' }}>
            <label for="finances_stock_nē" class="ml-2 text-gray-700">Nē</label>
        </div>
        <div class="flex items-center">
            <input type="radio"
                   name="responses[102][response_value][]" {{-- Correct name for Q101 checkboxes --}}
                   id="finances_stock_options" {{-- Unique ID --}}
                   value="options" {{-- Descriptive value --}}
                   class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                   {{ in_array('options', $selectedBanks) ? 'checked' : '' }}>
            <label for="finances_stock_options" class="ml-2 text-gray-700">Man pieder akciju opcijas</label>
        </div>

    </div>

    {{-- Hidden input for this specific question's ID --}}
    <input type="hidden" name="responses[102][question_id]" value="102">
</div>
<div class="mb-6"> {{-- Added margin-bottom for separation between questions --}}
    <label class="block text-gray-700 text-sm font-semibold mb-2" for="finances_banks_question">
        Vai Tev pieder kriptovalūtas? 
    </label>

    @php
        // Get previously selected values for Question 103 (assuming this is its ID)
        $selectedBanks = isset($responses[103]) && is_array($responses[103])
            ? $responses[103]
            : [];
    @endphp

    <div class="space-y-2">
        <div class="flex items-center">
            <input type="radio"
                   name="responses[103][response_value][]" {{-- Correct name for Q101 checkboxes --}}
                   id="finances_crypto_yes" {{-- Unique ID --}}
                   value="yes" {{-- Descriptive value --}}
                   class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                   {{ in_array('yes', $selectedBanks) ? 'checked' : '' }}>
            <label for="finances_crypto_yes" class="ml-2 text-gray-700">Jā</label>
        </div>
        <div class="flex items-center">
            <input type="radio"
                   name="responses[103][response_value][]" {{-- Correct name for Q101 checkboxes --}}
                   id="finances_crypto_no" {{-- Unique ID --}}
                   value="no" {{-- Descriptive value --}}
                   class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                   {{ in_array('no', $selectedBanks) ? 'checked' : '' }}>
            <label for="finances_crypto_nē" class="ml-2 text-gray-700">Nē</label>
        </div>
    </div>

    {{-- Hidden input for this specific question's ID --}}
    <input type="hidden" name="responses[103][question_id]" value="103">
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-semibold mb-2" for="real_estate_question">
        Vai Tev pieder kāds nekustamais īpašums?
    </label>
    <label for="real_estate_lv_count" class="block text-gray-700 text-sm mb-2">Nekustamo īpašumu skaits Latvijā</label>
    <select
        name="responses[104][response_value][]"
        id="real_estate_lv_count"
        class="block w-full px-3 py-2 text-base text-gray-900 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-lime-500 focus:border-lime-500 sm:text-sm"
    >
        <option value="">Izvēlēties skaitu</option>
        {{-- Blade loop to generate options 0-10 and 10+ --}}
        @for ($i = 0; $i <= 10; $i++)
            <option value="{{ $i }}" {{ isset($responses[104]) && $responses[104][0] == $i ? 'selected' : '' }}>
                {{ $i }}
            </option>
        @endfor
        <option value="10+" {{ isset($responses[104]) && $responses[104][0] == '10+' ? 'selected' : '' }}>
            10+
        </option>
    </select>
    <label for="real_estate_notlv_count" class="block text-gray-700 text-sm mb-2">Nekustamo īpašumu skaits ārzemēs</label>
    <select
        name="responses[104][response_value][]"
        id="real_estate_notlv_count"
        class="block w-full px-3 py-2 text-base text-gray-900 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-lime-500 focus:border-lime-500 sm:text-sm"
    >
        <option value="">Izvēlēties skaitu</option>
        {{-- Blade loop to generate options 0-10 and 10+ --}}
        @for ($i = 0; $i <= 10; $i++)
            <option value="{{ $i }}" {{ isset($responses[104]) && $responses[104][1] == $i ? 'selected' : '' }}>
                {{ $i }}
            </option>
        @endfor
        <option value="10+" {{ isset($responses[104]) && $responses[104][1] == '10+' ? 'selected' : '' }}>
            10+
        </option>
    </select>
</div>
{{-- Hidden input for this specific question's ID --}}
<input type="hidden" name="responses[104][question_id]" value="104">
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-semibold mb-2" for="real_estate_question">
        Vai Tev pieder kāds transportlīdzeklis?
    </label>
    <label for="transport_lv_count" class="block text-gray-700 text-sm mb-2">Transportlīdzekļu skaits (reģ. Latvijā)</label>
    <select
        name="responses[105][response_value][]"
        id="transport_lv_count"
        class="block w-full px-3 py-2 text-base text-gray-900 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-lime-500 focus:border-lime-500 sm:text-sm"
    >
        <option value="">Izvēlēties skaitu</option>
        {{-- Blade loop to generate options 0-10 and 10+ --}}
        @for ($i = 0; $i <= 10; $i++)
            <option value="{{ $i }}" {{ isset($responses[105]) && $responses[105][0] == $i ? 'selected' : '' }}>
                {{ $i }}
            </option>
        @endfor
        <option value="10+" {{ isset($responses[105]) && $responses[105][0] == '10+' ? 'selected' : '' }}>
            10+
        </option>
    </select>
    <label for="transport_notlv_count" class="block text-gray-700 text-sm mb-2">Transportlīdzekļu skaits (reģ. ārzemēs)</label>
    <select
        name="responses[105][response_value][]"
        id="transport_notlv_count"
        class="block w-full px-3 py-2 text-base text-gray-900 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-lime-500 focus:border-lime-500 sm:text-sm"
    >
        <option value="">Izvēlēties skaitu</option>
        {{-- Blade loop to generate options 0-10 and 10+ --}}
        @for ($i = 0; $i <= 10; $i++)
            <option value="{{ $i }}" {{ isset($responses[105]) && $responses[105][1] == $i ? 'selected' : '' }}>
                {{ $i }}
            </option>
        @endfor
        <option value="10+" {{ isset($responses[105]) && $responses[105][1] == '10+' ? 'selected' : '' }}>
            10+
        </option>
    </select>
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-semibold mb-2" for="fonds_main_label">
        Vai Tu esi investējis līdzekļus kādos fondos?
    </label>
    <label for="fonds_count" class="block text-gray-700 text-sm mb-2">
        Fondu pārvaldītāju skaits (0 = Nav fondu)
    </label>
    <select
        name="responses[106][response_value][]"
        id="fonds_count"
        class="block w-full px-3 py-2 text-base text-gray-900 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-lime-500 focus:border-lime-500 sm:text-sm"
    >
        <option value="">Izvēlēties skaitu</option>
        {{-- Blade loop to generate options 0-10 and 10+ --}}
        @for ($i = 0; $i <= 10; $i++)
            <option value="{{ $i }}" {{ isset($responses[106][0]) && $responses[106][0] == $i ? 'selected' : '' }}>
                {{ $i }}
            </option>
        @endfor
        <option value="10+" {{ isset($responses[106][0]) && $responses[106][0] == '10+' ? 'selected' : '' }}>
                10+
        </option>
    </select>
</div>
 <div class="mb-6"> {{-- Added margin-bottom for separation between questions --}}
        <label class="block text-gray-700 text-sm font-semibold mb-2" for="finances_banks_question">
            Vai Tev pieder kādas  īpaši vērtīgas fiziskas lietas (dārgmetāli, antikvāras preces, kolekcijas, tehnika, u.c.) 
        </label>

        @php
            $selectedBanks = isset($responses[107]) && is_array($responses[107])
                ? $responses[107]
                : [];
        @endphp

        <div class="space-y-2">
            <div class="flex items-center">
                <input type="radio"
                    name="responses[107][response_value][]" {{-- Correct name for Q101 checkboxes --}}
                    id="finances_fizisk_yes" {{-- Unique ID --}}
                    value="yes" {{-- Descriptive value --}}
                    class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                    {{ in_array('yes', $selectedBanks) ? 'checked' : '' }}>
                <label for="finances_fizisk_yes" class="ml-2 text-gray-700">Jā</label>
            </div>
            <div class="flex items-center">
                <input type="radio"
                    name="responses[107][response_value][]" {{-- Correct name for Q101 checkboxes --}}
                    id="finances_fizisk_no" {{-- Unique ID --}}
                    value="no" {{-- Descriptive value --}}
                    class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                    {{ in_array('no', $selectedBanks) ? 'checked' : '' }}>
                <label for="finances_fizisk_no" class="ml-2 text-gray-700">Nē</label>
            </div>
        </div>
    </div>


    <div class="mb-6"> {{-- Added margin-bottom for separation between questions --}}
        <label class="block text-gray-700 text-sm font-semibold mb-2" for="finances_banks_question">
            Vai ir kas cits finansiāli vērtīgs, kas Tev pieder un neietilpst nevienā no šīm kategorijām?
        </label>

        @php
            // Get previously selected values for Question 108 (assuming this is its ID)
            $selectedBanks = isset($responses[108]) && is_array($responses[108])
                ? $responses[108]
                : [];
        @endphp

        <div class="space-y-2">
            <div class="flex items-center">
                <input type="radio"
                    name="responses[108][response_value][]" {{-- Correct name for Q101 checkboxes --}}
                    id="finances_crypto_yes" {{-- Unique ID --}}
                    value="yes" {{-- Descriptive value --}}
                    class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                    {{ in_array('yes', $selectedBanks) ? 'checked' : '' }}>
                <label for="finances_crypto_yes" class="ml-2 text-gray-700">Jā</label>
            </div>
            <div class="flex items-center">
                <input type="radio"
                    name="responses[108][response_value][]" {{-- Correct name for Q101 checkboxes --}}
                    id="finances_crypto_no" {{-- Unique ID --}}
                    value="no" {{-- Descriptive value --}}
                    class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                    {{ in_array('no', $selectedBanks) ? 'checked' : '' }}>
                <label for="finances_crypto_no" class="ml-2 text-gray-700">Nē</label>
            </div>
        </div>
    </div>

    <input type="hidden" name="responses[106][question_id]" value="106">
    <input type="hidden" name="responses[107][question_id]" value="107">
    <input type="hidden" name="responses[108][question_id]" value="108">
    {{-- Hidden input for this specific question's ID --}}
    <input type="hidden" name="responses[105][question_id]" value="105">
</div>

    <!-- bottom navigation -->
     <div class="col-span-full flex justify-between items-center mt-6 w-full">
            <div>
                <a href="{{ route('dashboard.beres') }}"
                class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                    Atpakaļ
                </a>
            </div>

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

                <a href="{{ route('dashboard.testaments') }}"
                class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                    Tālāk
                </a>
            </div>
        </div>
    </form>
    
</section>
@endsection