@extends('layouts.app_layout_with_navbar')

@section('title', 'Medicīniskās izvēles un pilnvaras')

@section('main_content')
@include('components.mini-tab-navbar')
<section class="welcome-section">
    <br>
        <form action="{{ route('dashboard.med.save') }}" method="POST">  
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4">
              <!-- Column 1 -->
                <div class="flex border border-gray-300 p-4 m-2 rounded flex-col h-full p-2">
                  <div class="font-semibold mb-2">Orgānu ziedošana un ķermeņa izmantošana zinātnes attīstībā</div>
                  <div class="text-xs pt-4"><b>1.</b> Izlemiet, vai vēlaties ziedot orgānus kā donors vai atdot ķermeni zinātnei – ja to neizdarīsim vēl dzīviem esot, nepieciešamība gadījumā jautājums par orgānu ziedošanu tiks uzdots radiniekiem, kas var radīt ne tikai nepieciešamību veikt sarežģītu izvēli, bet pat novest pie domstarpībām.<br>
                                        <b>2.</b> Reģistrējiet savu izvēli:<br>
                                       <p style="text-indent: 2em;">a. Autorizējies portālā <a href="https://eveseliba.gov.lv/login" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">https://eveseliba.gov.lv/login</a>(iespējams pieslēgties ar e-parakstu vai Smart-ID)</p>
                                       <p style="text-indent: 2em;">b. Dodies uz <a href="https://www.eveseliba.gov.lv/resident#/patient-card/organs-and-body-usage-permits/organs-usage-for-transplantation" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">https://www.eveseliba.gov.lv/resident#/patient-card/organs-and-body-usage-permits/organs-usage-for-transplantation</a></p> <br>
                                       <b>3.</b> Izsaki savu gribu par orgānu ziedošanu, ķermeņa izmantošanu zinātnes attīstībā un pataloganatomiskajiem izmeklējumiem<br>
                                       <br> 
                                            <div class="green-links">
                                            <b>Labi zināt:</b><br>
                                            Ja paši neatzīmēsim savu izvēli, nepieciešamība gadījumā jautājums par jūsu uzskatiem saistībā ar šīm izvēlēm tiks uzdots radiniekiem, kuri var jūsu vēlmes nezināt.
                                            </div>
                                        </div>
                                        <br>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="responses[13][response_value]" id="organ_donation" value="1" class="w-6 h-6 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                        {{ isset($responses[13]) && $responses[13] ? 'checked' : '' }}>
                        <label for="organ_donation">Mana izvēle par orgānu ziedošanu ir veikta</label>
                        <input type="hidden" name="responses[13][question_id]" value="13">
                    </div>
                    <br>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="responses[14][response_value]" id="body_donation" value="1" class="w-6 h-6 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                        {{ isset($responses[14]) && $responses[14] ? 'checked' : '' }}>
                        <label for="body_donation">Mana izvēle par ķermeņa izmantošanu zinātnei ir veikta</label>
                        <input type="hidden" name="responses[14][question_id]" value="14">
                    </div>
                </div>
              <!-- Column 2 -->
              <div class="flex border border-gray-300 p-4 m-2 rounded flex-col h-full">
                  <div class="font-semibold mb-2">Orgānu ziedošana un ķermeņa izmantošana zinātnes attīstībā</div>
                  <div class="text-xs pt-4"><b>1.</b> Autorizējies portālā <a href="https://eveseliba.gov.lv/login" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">https://eveseliba.gov.lv/login</a> (iespējams pieslēgties ar e-parakstu vai Smart-ID)<br>
                                            <b>2.</b> Dodies uz <a href="https://www.eveseliba.gov.lv/resident#/patient-card/future-mandate" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">https://www.eveseliba.gov.lv/resident#/patient-card/future-mandate</a><br>
                                            <b>3.</b> Informē izvēlēto personu par savām preferencēm (piemēram, pēc cik ilga laika cilvēku atslēgt no dzīvību uzturošām ierīcēm)<br>
                                        <br>
                                        <div class="green-links">
                                            <b>Labi zināt:</b><br>
                                            Kopš 2022. gada, likums paredz, ka ikviens pacients varēs pilnvarot savu pārstāvi neatkarīgi no tā, vai šī persona ir radinieks, faktiskās kopdzīves partneris vai jebkura cita uzticības persona, ko pacients ir izraudzījies savu interešu nodrošināšanai un aizsardzībai.
                                            </div>
                                            </div>
                                            <br>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="responses[15][response_value]" id="future_mandate" value="1" class="w-6 h-6 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                        {{ isset($responses[15]) && $responses[15] ? 'checked' : '' }}>
                        <label for="future_mandate">Mana pilnvara par ar ārstniecību saistītiem lēmumiem ir sagatavota</label>
                        <input type="hidden" name="responses[15][question_id]" value="15">
                    </div>
                    <br>
                </div>
                <div class="col-span-full flex justify-between items-center mt-6 w-full">
                <!-- Left minimal button -->
                            <div class="w-full max-w-screen-lg mx-auto px-4 py-6 flex justify-between items-center">
                                <a href="{{ route('dashboard') }}"
                                class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                                    Uz rīka sākumlapu
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

                                    <a href="{{ route('dashboard.pensija') }}"
                                    class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                                        Tālāk
                                    </a>
                                </div>
                            </div>
                </div>             
        </form>
</section>
@endsection