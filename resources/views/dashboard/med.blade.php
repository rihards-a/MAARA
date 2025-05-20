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
                        <input type="checkbox" name="organ_donation" value="1" class="w-6 h-6 text-lime-600 focus:ring-lime-600 border-gray-300 rounded">
                        <label for="organ_donation">Mana izvēle par orgānu ziedošanu ir veikta</label>
                    </div>
                    <br>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" name="body_donation" value="1" class="w-6 h-6 text-lime-600 focus:ring-lime-600 border-gray-300 rounded">
                        <label for="body_donation">Mana izvēle par ķermeņa izmantošanu zinātnei ir veikta</label>
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
                        <input type="checkbox" name="future_mandate" value="1" class="w-6 h-6 text-lime-600 focus:ring-lime-600 border-gray-300 rounded">
                        <label for="future_mandate">Mana pilnvara par ar ārstniecību saistītiem lēmumiem ir sagatavota</label>
                    </div>
                    <br>
                </div>
                <div class="col-span-full flex justify-between items-center mt-6 w-full">
                <!-- Left minimal button -->
                    <a href="{{ route('dashboard') }}"
                    class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                        Uz Gida sākumlapu
                    </a>

                    <!-- Center save button -->
                    <button type="submit"
                        class="bg-moss hover:bg-green-700 text-white font-bold py-3 px-6 rounded-md focus:outline-none focus:shadow-outline">
                        Saglabāt
                    </button>

                    <!-- Right minimal button -->
                    <a href="{{ route('dashboard.pensija') }}"
                    class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                        Tālāk
                    </a>
                </div>             
        </form>
</section>
@endsection