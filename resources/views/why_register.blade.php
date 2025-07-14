@extends('layouts.app_layout_with_navbar')

@section('title', 'Ceļvedis atbildīgajiem: turi savas lietas kārtībā - ātri, skaidri un vienkārši.')

@section('main_content')
<div class="guide-background">
    <section class="welcome-section px-4 py-12 max-w-7xl mx-auto">
        <h1 class="welcome-title">
            Ceļvedis atbildīgajiem: turi savas lietas kārtībā – ātri, skaidri un vienkārši.
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <div>
                <p class="mb-6 text-gray-700">
                    Reģistrējies, lai izveidotu savu profilu mūsu sistēmā, kas ļaus Tev ne tikai ērti aizpildīt saistošu informāciju par savām preferencēm, bet arī sniegs papildus ieskatus un padomus, kas ļaus vieglāk pieņemt vēl nepieņemtus lēmumus.
                </p>
                <div class="flex flex-col space-y-4 md:flex-row md:space-x-4 md:space-y-0">
                    <a href="{{ route('register') }}" class="card-button-green">
                        Reģistrēties ar e-pastu
                    </a>
                    <a href="{{ route('register') }}" class="card-button-green flex items-center justify-center">
                        <img src="https://www.svgrepo.com/show/355037/google.svg" alt="Google Logo" class="w-5 h-5 mr-2">
                        Reģistrēties ar Gmail
                    </a>
                </div>
            </div>

            <div>
                <p class="mb-6 text-gray-700">
                    Mēs esam izveidojuši visaptverošu "darba lapu", kuras aizpildīšana pasargās Tavus tuvos no sarežģītiem lēmumiem, zaudētiem līdzekļiem un, iespējams, pat ģimenes strīdiem, gadījumā, ja Tevi piemeklēs nāve.
                </p>
                <p class="mb-6 text-gray-700">
                    Tas ir līdzīgi kā dzīvības apdrošināšana – tikai finanšu līdzekļu vietā, caur pilnvērtīgas informācijas atstāšanu, tuvinieki sajutīs Tavas rūpes, apdomību un praktisko atbalstu.
                </p>
            </div>
        </div>

        <div class="mt-16">
            <h1 class="welcome-title">Kā tas strādā?</h2>
            <ol class="list-decimal pl-6 space-y-2 text-gray-700">
                <li>Reģistrējies MAARA sistēmā ar savu e-pastu un paroli vai Gmail kontu un veic vienreizēju maksājumu EUR 14.99 apmērā.</li>
                <li>Piekļūsti skaidrai un saprotamai sistēmai, kas ļauj Tev droši, ērti un ātri dokumentēt savas preferences un citu informāciju, kas var būt noderīga Taviem tuviniekiem.</li>
                <li>Iepazīsties ar mūsu apkopotajiem profesionāļu ieteikumiem par to, kā visdrošāk uzglabāt dažādus datus, kas varētu kļūt aktuāli pēc Tavas nāves.</li>
                <li>Ērti eksportē Tevis aizpildīto "ceļvedi", kas kalpos kā skaidrības garantija Taviem tuviniekiem.</li>
                <li>Pieraksties uz ikgadējiem e-pasta atgādinājumiem pārskatīt savus lēmumus.</li>
            </ol>
        </div>
    </section>
</div>
@endsection

