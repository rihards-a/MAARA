@extends('layouts.app_layout_with_navbar')

@section('title', 'Pensijas mantošana')

@section('main_content')
<section class="welcome-section">
@include('components.mini-tab-navbar')
    <br>
        <form action="{{ route('dashboard.pensija.save') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4">
              <!-- Column 1 -->
                <div class="flex border border-gray-300 p-4 m-2 rounded flex-col h-full p-2">
                  <div class="font-semibold mb-2">Pensijas 2. līmeņa uzkrājuma mantošana</div>
                  <div class="text-xs pt-4"><b>1.</b>Lai pieprasītu pakalpojumu, jāaizpilda noteiktas formas iesniegums, kas adresēts VSAA. <br> 
                                        <b>2.</b>Visērtāk iesniegumu iesniegt izmantojot elektronisko pakalpojumu Pensiju 2. līmeņa dalībnieka izvēles par uzkrātā kapitāla mantošanu reģistrēšana valsts pārvaldes pakalpojumu portālā Latvija.gov.lv.<br> 
                                        <b>3.</b>Autorizējies portālā <a href="https://latvija.gov.lv/" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">https://latvija.gov.lv/</a> (iespējams pieslēgties ar e-parakstu vai Smart-ID)<br> 
                                        <b>4.</b>Meklētājā raksti "Pensiju 2. līmeņa dalībnieka izvēles par uzkrātā kapitāla mantošanu reģistrēšana" vai dodies uz <a href="https://latvija.gov.lv/Services/10920" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">https://latvija.gov.lv/Services/10920</a><br> 
                                        <b>5.</b>Izsaki savu gribu par to, kas notiks ar Tavu pensijas 2. līmeņa uzkrājumu<br> 
                                        <br>
                                        <div class="green-links">
                                                <b>Labi zināt:</b><br>
                                                Ja kā mantinieku norādīsi konkrētu personu, tai mantojuma izpildes brīdī būs jābūt pensiju 2.līmeņa dalībniekam - citādi tavs pensiju 2.līmenī uzkrātais kapitāls tiks mantots Civillikumā noteiktajā kārtībā
                                                </div>    
                                        </div>
                                        <br>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="responses[16][response_value]" id="pension" value="1" class="w-6 h-6 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                        {{ isset($responses[16]) && $responses[16] ? 'checked' : '' }}>
                        <label for="pension">Mana izvēle par pensijas 2. līmeņa uzkrājuma mantošanu ir veikta</label>
                        <input type="hidden" name="responses[16][question_id]" value="16">
                    </div>
                    <br>
                </div>
                <div class="col-span-full flex justify-between items-center mt-6 w-full">
                <!-- Left minimal button -->
                    <a href="{{ route('dashboard.med') }}"
                    class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                        Atpakaļ
                    </a>

                    <!-- Center save button -->
                    <button type="submit"
                        class="bg-moss hover:bg-green-700 text-white font-bold py-3 px-6 rounded-md focus:outline-none focus:shadow-outline">
                        Saglabāt
                    </button>

                    <!-- Right minimal button -->
                    <a href="{{ route('dashboard.beres') }}"
                    class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                        Tālāk
                    </a>
                </div>  

        </form>
</section>
@endsection