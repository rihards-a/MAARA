@extends('layouts.app_layout_with_navbar')

@section('title', 'Ceļvedis atbildīgajiem: turi savas lietas kārtībā - ātri, skaidri un vienkārši.')

@section('main_content')
<div class="guide-background">
    <section class="welcome-section px-4 py-12 max-w-7xl mx-auto">
        <h1 class="welcome-title">
            Ceļvedis atbildīgajiem: turi savas lietas kārtībā - ātri, skaidri un vienkārši.
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
            <div>
                <p class="mb-6 text-gray-700">
                    Reģistrējies, lai izveidotu savu profilu mūsu sistēmā, kas ļaus Tev <b>ne tikai ērti aizpildīt saistošu informāciju par savām preferencēm, bet arī sniegs papildus ieskatus un padomus,</b> kas ļaus vieglāk pieņemt vēl nepieņemtus lēmumus.
                <br>
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
                <p>
                <img src="{{ asset('images/samplepage.png') }}" alt="samplepage" style="width: 100%; height: auto; padding: 10px;">
                </p>
            </div>
        </div>

        <div>
            <br>
                <p class="mb-6 text-gray-700">
                    Mēs esam izveidojuši visaptverošu ''darba lapu'', kuras aizpildīšana <b>pasargās Tavus tuvos no sarežģītiem lēmumiem,</b> zaudētiem līdzekļiem, un, iespējams, pat ģimenes strīdiem, gadījumā, ja Tevi piemeklēs nāve.
                </p>   
        </div>

        <div class="mt-16">
        <h1 class="welcome-title">Kā tas strādā?</h1>
        <p class="flex items-center space-x-3 mb-4">
            <span class="guide-numbers bg-moss text-white w-8 h-8 flex items-center justify-center !rounded-full bg-moss text-white leading-none shrink-0">1.</span>
            <span>Reģistrējies MAARA sistēmā ar savu e-pastu un paroli vai Gmail kontu un veic vienreizēju maksājumu EUR 14.99 apmērā</span>
        </p>
        <p class="flex items-center space-x-3 mb-4">
            <span class="guide-numbers bg-moss text-white w-8 h-8 flex items-center justify-center !rounded-full bg-moss text-white leading-none shrink-0">2.</span>
            <span>Piekļūsti skaidrai un saprotamai sistēmai, kas ļauj Tev droši, ērti un ātri dokumentēt savas preferences un citu informāciju, kas var būt noderīga Taviem tuviniekiem.</span>
        </p>
        <p class="flex items-center space-x-3 mb-4">
            <span class="guide-numbers bg-moss text-white w-8 h-8 flex items-center justify-center !rounded-full bg-moss text-white leading-none shrink-0">3.</span>
            <span>Iepazīsties ar mūsu apkopotajiem profesionāļu ieteikumiem par to, kā visdrošāk uzglabāt dažādus datus, kas varētu kļūt aktuāli pēc Tavas nāves.</span>
        </p>
        <p class="flex items-center space-x-3 mb-4">
            <span class="guide-numbers bg-moss text-white w-8 h-8 flex items-center justify-center !rounded-full bg-moss text-white leading-none shrink-0">4.</span>
            <span>Ērti eksportē Tevis aizpildīto ''ceļvedi'', kas kalpos kā skaidrības garantija Taviem tuviniekiem.</span>
        </p>
        <p class="flex items-center space-x-3 mb-4">
            <span class="guide-numbers bg-moss text-white w-8 h-8 flex items-center justify-center !rounded-full bg-moss text-white leading-none shrink-0">5.</span>
            <span>Pieraksties uz ikgadējiem e-pasta atgādinājumiem pārskatīt savus lēmumus.</span>
        </p>
        </div>

    </section>
</div>
@endsection

