@extends('layouts.app_layout_with_navbar')

@section('title', 'Par mums')

@section('main_content')
<section class="welcome-section">
@include('components.mini-tab-navbar')
    <br>
    <h1 class="welcome-title">Aizpildiet sev svarīgos laukus</h1>
    <p class="welcome-text text-sm">
    Bēru organizēšana mēdz kļūt par galveno praktisko diskusiju objektu palicēju starpā. Pētījumi rāda, ka pat visaptuvenākās norādes no aizgājēja ļauj tuviniekiem justies labāk par šī atvadīšanās rituāla norisi (protams, kamēr vien šīs vēlmes ir īstenojamas, ņemot vērā materiālās un praktiskās iespējas).
    Šajā sadaļā īpaši iesakām aizpildīt divus ''atvērtos'' laukus - par lietām, kas Tev ir īpaši svarīgas (gan no vēlamās, gan nevēlamās puses). Papildus, esam pievienojuši iespēju norādīt arī sīkākas detaļas, ja esi gatavs par tām šobrīd aizdomāties. Arī vēlme neatvadīties bēru ceremonijas formātā ir saprotama personīgā izvēle, ko vari šeit aprakstīt.
    </p>
        <form action="/dashboard-3" method="POST" class="bg-white shadow-md rounded-lg p-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @csrf
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-1" for="not_wanted">
                    Apraksti sev svarīgākās bēru detaļas*:
                </label>
                <textarea name="not_wanted" id="not_wanted" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-900 focus:ring-lime-900 text-gray-700 text-sm p-9" placeholder="Vissvarīgāk man ir, lai..."></textarea>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-1" for="not_wanted">
                    Ko Tu noteikti negribētu savās bērēs?*
                </label>
                <textarea name="not_wanted" id="not_wanted" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-900 focus:ring-lime-900 text-gray-700 text-sm p-9" placeholder="Es noteikti negribētu, lai..."></textarea>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-1" for="burial_preference">
                    Apglabāšanas preference:
                </label>
                <select name="burial_preference" id="burial_preference" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-900 focus:ring-lime-900 text-gray-700 text-sm p-3">
                    <option  disabled selected value="">Izvēlēties</option>    
                    <option value="kremācija">Kremācija</option>
                    <option value="apglabāšana">Apglabāšana</option>
                    <option value="ķermeņa ziedošana zinātnei">Ķermeņa ziedošana zinātnei</option>
                    <option value="cits">Cits (norādīt sadaļā ''Atdusas vieta'')</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-1" for="resting_place">
                    Norādes par atdusas vietu:
                </label>
                <textarea name="resting_place" id="resting_place" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-900 focus:ring-lime-900 text-black-700 text-sm p-4" placeholder="Šeit norādi konkrētu atdusas vietu, ja tāda ir (pelnu izkaisīšanas lokāciju vai/un kapsētu)"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-1" for="eulogy">
                    Bēru runa:
                </label>
                <textarea name="eulogy" id="eulogy" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-900 focus:ring-lime-900 text-black-700 text-sm p-4" placeholder="Vēlamais autors un aptuvenais saturs, ja Tev ir konkrētas vēlmes"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-1" for="music">
                    Mūzikas izvēle:
                </label>
                <textarea name="music" id="music" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-900 focus:ring-lime-900 text-black-700 text-sm p-4" placeholder="Vai ir kāda dziesma, konkrēti mūzikas instrumenti vai žanrs, ko Tu izvēlētos savām bērēm?"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-1" for="farewell_location">
                    Atvadīšanās lokācija:
                </label>
                <textarea name="farewell_location" id="farewell_location" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-900 focus:ring-lime-900 text-black-700 text-sm p-4" placeholder=" Bēru ceremonijas norises vieta"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-1" for="overall_mood">
                    Kopējā noskaņa:
                </label>
                <textarea name="overall_mood" id="overall_mood" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-900 focus:ring-lime-900 text-black-700 text-sm p-4" placeholder="Apraksti sevis iztēloto noskaņu ar īpašības vārdiem (piemēram, ''gaiša'', ''apcerīga'', ''piezemēta'', u.c.)"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-1" for="guests">
                    Uzaicinātie viesi:
                </label>
                <textarea name="guests" id="guests" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-900 focus:ring-lime-900 text-black-700 text-sm p-4" placeholder="Vai vēlies visiem pieejamu vai ļoti privātu atvadīšanos?"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-1" for="ritual_items">
                    Rituālie priekšmeti (zārks, urna, piemineklis, u.c.):
                </label>
                <textarea name="ritual_items" id="ritual_items" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-900 focus:ring-lime-900 text-black-700 text-sm p-4" placeholder=" Apraksti savas vēlmes saistībā ar tradicionālo apbedīšanas priekšmetu noformējumu, ja tādas ir"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-1" for="flowers">
                    Ziedu izvēle:
                </label>
                <textarea name="flowers" id="flowers" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-900 focus:ring-lime-900 text-black-700 text-sm p-4" placeholder="Ja Tev ir ziedu preferences, norādi tās šeit"></textarea>
            </div>
            
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-1" for="advisors">
                    Organizatori vai padomdevēji:
                </label>
                <textarea name="advisors" id="advisors" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-900 focus:ring-lime-900 text-black-700 text-sm p-4" placeholder="Vai ir kāds tuvinieks(--i), uz kuru izvēlēm un darbībām Tu īpaši paļaujies?"></textarea>
            </div>
            
            <div class="col-span-full flex justify-end mt-6">
                <button type="submit" class="bg-moss hover:bg-green-700 text-white font-bold py-3 px-4 rounded-md focus:outline-none focus:shadow-outline">
                    Saglabāt
                </button>
            </div>
        </form>
</section>
@endsection
