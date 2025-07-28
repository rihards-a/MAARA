@extends('layouts.app_layout_with_navbar')

@section('title', 'Digitālais mantojums')

@section('main_content')

@include('components.mini-tab-navbar')
<section class="welcome-section">
    <h1 class="welcome-title px-6">Digitālais mantojums</h1>
    <p class="welcome-text text-sm p-6">
    Mūsdienās cilvēks aiz sevis atstāj ne tikai taustāmas lietas, bet arī jūkli ar informāciju digitālajā vidē. Nereti šī informācija iekļauj kaut ko, kas ir finansiāli vai sentimentāli vērtīgs. Tāpat, ir ļoti svarīgi, lai Tavs privātums tiktu cienīts arī pēc nāves, tāpēc aicinām atstāt instrukcijas arī par to, kuriem tuviniekiem uztici veikt darbības ar saviem sociālo mediju vai saziņas rīku kontiem. Aizgājušu cilvēku konti var tik izmantoti arī ļaunprātīgām darbībām - tie var tikt uzlauzti un izmantoti informācijas izplatīšanai, tāpēc ir ļoti svarīgi tos vienkārši ''nepamest''.<br>
    <br>
    Tā kā esi reģistrējies mūsu platformā, mēs zinām, ka Tev noteikti ir epasts - informācijas aizpildīšana par e-pastu ir minimums, kas nepieciešams, lai šo sadaļu atzīmētu kā pabeigtu. Lietas, kuras šķiet sarežģītas vai nesaprotamas, var droši izlaist vai uzdot jautājumus mūsu e-pastā: info@maara.id.lv - labprāt sīkāk konsultēsim par šiem risinājumiem.<br>
    </p>
        <div class="green-links">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start text-sm p-8"> 
                <div>
                    <p>
                        <b>Gatavie risinājumi</b><br>
                        <br>
                        Lielākās platformas bieži vien piedāvā iespēju veikt darbības ar cilvēka kontu pēc viņa aiziešanas. Parasti ir divu veidu pieeja: pirmajā variantā Tu pats vari izvēlēties, pēc cik ilga laika neaktivitātes Tavs konts tiks izdzēsts vai nodots tuviniekam, bet otrajā variantā Taviem tuviniekiem būs jāsakontaktējas ar konkrēto pakalpojumu un jāiesniedz miršanas apliecība, lai tā pārvaldība tiktu nodota tuvinieka rokās. Otrajā gadījumā gan nav definēts, kurš tieši tuvinieks būs tas, kurš veiks darbības ar Tavu kontu, kamēr vien viņam būs pieejama miršanas apliecība.
                    </p>
                    <br>
                    <p>
                        Populārākās platformas, kurām pieejami iebūvēti risinājumi:
                    </p>
                    <ul class="list-disc">
                        <li><b>Facebook:</b> iespējams pievienot kontaktpersonu/pārvaldītāju nāves gadījumā vai norādīt vēlmi izveidot piemiņas profilu</li>
                        <li><b>Google:</b> Neaktīvo kontu pārvaldība (šī funkcija ļauj Tev sīki norādīt, pēc cik ilga laika Tavu kontu jāatzīst par neaktīvu, un kādas ir tālākās darbības, kas jāveic)</li>
                        <li><b>Instagram:</b> iespējams izveidot piemiņas profilu vai kontu dzēst pēc pieprasījuma (tikai tuvinieki)</li>
                        <li><b>Apple:</b> iespējams pievienot kontaktus, kas pēc Tavas aiziešanas pārņems pārvaldību pār Tavu kontu</li>
                    </ul>
                    <br>
                    <p>
                        Mēs aicinām Tevi izpētīt, vai Tevis lietotie sociālie tīkli vai programmas piedāvā šādu funkciju, un veikt atbilstošas darbības. Parasti to var atrast, ja meklēšanas pārlūkā meklē informāciju izmantojot atslēgas vārdus '''izmantotais konts'' (piemēram, Google vai Samsung) un ''legacy'' vai ''inactivity''.<br>
                        <br>
                        <img src="{{ asset('images/digtestaments_1.jpg') }}" alt="inacticity" class="rounded-lg shadow-md" style="width: 100%; height: auto; padding: 10px;">
                    </p>    
                </div>

                <div>
                    <p>
                        <b>Paroļu uzglabāšana</b><br>
                        <br>
                        Gatavie risinājumi ir lieliski, ja vēlies ar savu informāciju tikt galā pats, tomēr, ja Tev ir kāds cilvēks, kam Tu uzticies, visaptverošāks un ērtāks risinājums varētu būt visu savu paroļu apkopošana vienā drošā un ērtā rīkā, lai palicēji varētu piekļūt Taviem kontiem un veikt darbības atbilstoši Tavām vēlmēm.<br>
                    </p>
                    <br>
                    <p>
                        Mēs iesakām bezmaksas rīku LastPass, kurš arī piedāvā funkciju dalīties ar informāciju ar noteiktu tuvinieku Tavas aiziešanas gadījumā. Turklāt, šajā rīkā vari uzglabāt ne tikai savas paroles, bet arī svarīgu un slepenu informāciju, ko vēlies izpaust tikai pēc savas nāves - tas atbilst augstākajiem drošības standartiem.
                    </p>
                    <br>
                            <img src="{{ asset('images/digtestaments_2.jpg') }}" alt="inacticity" class="rounded-lg shadow-md" style="width: 100%; height: auto; padding: 10px;">
                    <br>
                    <br>
                    <p>
                        Ja ar tehnoloģijām esi ''uz jūs'', paroļu apkopošanu var veikt arī uz papīra, tomēr pārliecinies, ka šāds papīrs tiek glabāts ļoti drošā vietā un kāds no tuviniekiem zina par tā eksistenci.<br>
                    </p>    
                </div>
            </div>
        </div>

            <h2 class="bg-moss text-white w-full text-l font-semibold mb-4 text-center">Sākam darbu!</h2>
            <h2 class="text-l font-semibold mb-4 text-center" id="digitalas-ierices">Personīgie konti</h2>
                Lai atzīmētu Digitālā mantojuma sadaļu kā pabeigtu, Tev ir jānorāda informācija par vismaz vienu personīgo kontu (piemēram, Tavu galveno e-pastu).<br>
                Papildus, šajā sadaļā aicinām Tevi censties atcerēties būtiskākos sociālos un saziņas rīkus, ko izmanto ikdienā, aizpildāmajos laukos norādot savas vēlmes un ar tām saistītās darbības. Starp populārākajiem rīkiem šajā sadaļā varētu būt Facebook, Gmail, Outlook, Instagram, Twitter (X), WhatsApp, Telegram, Signal un TikTok.
            </p>
            <div class="mb-4">
            <h2 class="text-base font-semibold mb-0" id="accounts-section">Mani konti</h2>
            </div>

            @if($accounts->isEmpty())
            <div class="mt-0 bg-gray-50 rounded-lg p-6 text-center text-gray-500">
                Jums vēl nav neviena konta
            </div>
            @else
                <div class="mt-2">
                    @foreach($accounts as $account)
                    <div class="mb-0 p-6 bg-white">
                        <h2 class="text-xl font-semibold mt-0 mb-0">Konts {{ $account->name }}</h2>

                        <form action="{{ route('dashboard.accounts.update', $account->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                                <div>
                                    <label for="name-{{ $account->id }}" class="block text-gray-700 text-sm font-bold mb-2">Konts:</label>
                                    <textarea
                                        name="name"
                                        id="name-{{ $account->id }}"
                                        class="h-[46px] w-full p-3 border border-gray-300 rounded-md text-sm focus:border-lime-600 focus:ring-lime-600"
                                        required
                                    >{{ $account->name }}</textarea>
                                </div>

                                <div>
                                    <label for="importance-{{ $account->id }}" class="block text-gray-700 text-sm font-bold mb-2">Konta nozīmīgums:</label>
                                    <select name="importance" id="importance-{{ $account->id }}" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
                                        <option disabled {{ empty($account->importance) ? 'selected' : '' }} value="">Informācijas svarīgums</option>
                                        <option value="Ļoti svarīga" {{ $account->importance == 'Ļoti svarīga' ? 'selected' : '' }}>Ļoti svarīga</option>
                                        <option value="Diezgan svarīga" {{ $account->importance == 'Diezgan svarīga' ? 'selected' : '' }}>Diezgan svarīga</option>
                                        <option value="Mazsvarīga" {{ $account->importance == 'Mazsvarīga' ? 'selected' : '' }}>Mazsvarīga</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="access_method-{{ $account->id }}" class="block text-gray-700 text-sm font-bold mb-2">Piekļuve kontam:</label>
                                    <select name="access_method" id="access_method-{{ $account->id }}" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
                                        <option disabled {{ empty($account->access_method) ? 'selected' : '' }} value="">Kā piekļūt kontam?</option>
                                        <option value="Izmantoju rīka gatavo risinājumu" {{ $account->access_method == 'Izmantoju rīka gatavo risinājumu' ? 'selected' : '' }}>Izmantoju rīka gatavo risinājumu</option>
                                        <option value="Ierakstīju piekļuves datus Lastpass vai citā rīkā" {{ $account->access_method == 'Ierakstīju piekļuves datus Lastpass vai citā rīkā' ? 'selected' : '' }}>Ierakstīju piekļuves datus Lastpass vai citā rīkā</option>
                                        <option value="Uzrakstīju piekļuves datus uz papīra lapas" {{ $account->access_method == 'Uzrakstīju piekļuves datus uz papīra lapas' ? 'selected' : '' }}>Uzrakstīju piekļuves datus uz papīra lapas</option>
                                        <option value="Neko neizdarīju" {{ $account->access_method == 'Neko neizdarīju' ? 'selected' : '' }}>Neko neizdarīju</option>
                                        <option value="Cits" {{ $account->access_method == 'Cits' ? 'selected' : '' }}>Cits</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="action_after_death-{{ $account->id }}" class="block text-gray-700 text-sm font-bold mb-2">Ko darīt ar kontu?</label>
                                    <select name="action_after_death" id="action_after_death-{{ $account->id }}" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
                                        <option disabled {{ empty($account->action_after_death) ? 'selected' : '' }} value="">Ko darīt ar kontu?</option>
                                        <option value="Nekavējoties dzēst" {{ $account->action_after_death == 'Nekavējoties dzēst' ? 'selected' : '' }}>Nekavējoties dzēst</option>
                                        <option value="Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga" {{ $account->action_after_death == 'Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga' ? 'selected' : '' }}>Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga</option>
                                        <option value="Izveidot piemiņas profilu, nepārskatīt informāciju" {{ $account->action_after_death == 'Izveidot piemiņas profilu, nepārskatīt informāciju' ? 'selected' : '' }}>Izveidot piemiņas profilu, nepārskatīt informāciju</option>
                                        <option value="Izveidot piemiņas profilu, pārskatīt un saglabāt informāciju" {{ $account->action_after_death == 'Izveidot piemiņas profilu, pārskatīt un saglabāt informāciju' ? 'selected' : '' }}>Izveidot piemiņas profilu, pārskatīt un saglabāt informāciju</option>
                                        <option value="Neko nedarīt" {{ $account->action_after_death == 'Neko nedarīt' ? 'selected' : '' }}>Neko nedarīt</option>
                                        <option value="Cits" {{ $account->action_after_death == 'Cits' ? 'selected' : '' }}>Cits</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="comments-{{ $account->id }}" class="block text-gray-700 text-sm font-bold mb-2">Papildus komentārs:</label>
                                    <textarea
                                        name="comments"
                                        id="comments-{{ $account->id }}"
                                        class="h-[46px] w-full p-3 border border-gray-300 rounded-md text-sm focus:border-lime-600 focus:ring-lime-600"
                                        placeholder="brīvs komentārs"
                                    >{{ $account->comments }}</textarea>
                                </div>
                            </div>

                            <div class="flex justify-between items-center mt-6">
                                <button type="submit" class="bg-moss text-white rounded-md py-2 px-4 text-sm hover:bg-moss/80">
                                    Saglabāt izmaiņas
                                </button>

                                <button type="button" onclick="if(confirm('Vai tiešām vēlaties dzēst šo kontu?')) document.getElementById('delete-account-form-{{ $account->id }}').submit();" class="bg-[#D6A2B5] text-white rounded-md py-2 px-4 text-sm hover:bg-[#D6A2B5]/80">
                                    Dzēst
                                </button>
                            </div>
                        </form>

                        <form id="delete-account-form-{{ $account->id }}" action="{{ route('dashboard.accounts.destroy', $account->id) }}" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                    @endforeach
                </div>
            @endif

            @if($accounts->count() < 20)
                <div class="mb-8 p-6 bg-white rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-4">Pievienot jaunu kontu</h2>
                    <form action="{{ route('dashboard.accounts.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                            <div>
                                <label for="new-account-name" class="block text-gray-700 text-sm font-bold mb-2">Konts:</label>
                                <textarea
                                    name="name"
                                    id="new-account-name"
                                    value="{{ old('name') }}"
                                    placeholder="Konta nosaukums"
                                    class="h-[46px] w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3"
                                    required
                                >{{ old('name') }}</textarea>
                            </div>

                            <div>
                                <label for="new-account-importance" class="block text-gray-700 text-sm font-bold mb-2">Konta nozīmīgums:</label>
                                <select name="importance" id="new-account-importance" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
                                    <option disabled selected value="">Informācijas svarīgums</option>
                                    <option value="Ļoti svarīga" {{ old('importance') == 'Ļoti svarīga' ? 'selected' : '' }}>Ļoti svarīga</option>
                                    <option value="Diezgan svarīga" {{ old('importance') == 'Diezgan svarīga' ? 'selected' : '' }}>Diezgan svarīga</option>
                                    <option value="Mazsvarīga" {{ old('importance') == 'Mazsvarīga' ? 'selected' : '' }}>Mazsvarīga</option>
                                </select>
                            </div>

                            <div>
                                <label for="new-account-access_method" class="block text-gray-700 text-sm font-bold mb-2">Piekļuve kontam:</label>
                                <select name="access_method" id="new-account-access_method" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
                                    <option disabled selected value="">Kā piekļūt kontam?</option>
                                    <option value="Izmantoju rīka gatavo risinājumu" {{ old('access_method') == 'Izmantoju rīka gatavo risinājumu' ? 'selected' : '' }}>Izmantoju rīka gatavo risinājumu</option>
                                    <option value="Ierakstīju piekļuves datus Lastpass vai citā rīkā" {{ old('access_method') == 'Ierakstīju piekļuves datus Lastpass vai citā rīkā' ? 'selected' : '' }}>Ierakstīju piekļuves datus Lastpass vai citā rīkā</option>
                                    <option value="Uzrakstīju piekļuves datus uz papīra lapas" {{ old('access_method') == 'Uzrakstīju piekļuves datus uz papīra lapas' ? 'selected' : '' }}>Uzrakstīju piekļuves datus uz papīra lapas</option>
                                    <option value="Neko neizdarīju" {{ old('access_method') == 'Neko neizdarīju' ? 'selected' : '' }}>Neko neizdarīju</option>
                                    <option value="Cits" {{ old('access_method') == 'Cits' ? 'selected' : '' }}>Cits</option>
                                </select>
                            </div>

                            <div>
                                <label for="new-account-action_after_death" class="block text-gray-700 text-sm font-bold mb-2">Ko darīt ar kontu?</label>
                                <select name="action_after_death" id="new-account-action_after_death" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
                                    <option disabled selected value="">Ko darīt ar kontu?</option>
                                    <option value="Nekavējoties dzēst" {{ old('action_after_death') == 'Nekavējoties dzēst' ? 'selected' : '' }}>Nekavējoties dzēst</option>
                                    <option value="Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga" {{ old('action_after_death') == 'Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga' ? 'selected' : '' }}>Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga</option>
                                    <option value="Izveidot piemiņas profilu, nepārskatīt informāciju" {{ old('action_after_death') == 'Izveidot piemiņas profilu, nepārskatīt informāciju' ? 'selected' : '' }}>Izveidot piemiņas profilu, nepārskatīt informāciju</option>
                                    <option value="Izveidot piemiņas profilu, pārskatīt un saglabāt informāciju" {{ old('action_after_death') == 'Izveidot piemiņas profilu, pārskatīt un saglabāt informāciju' ? 'selected' : '' }}>Izveidot piemiņas profilu, pārskatīt un saglabāt informāciju</option>
                                    <option value="Neko nedarīt" {{ old('action_after_death') == 'Neko nedarīt' ? 'selected' : '' }}>Neko nedarīt</option>
                                    <option value="Cits" {{ old('action_after_death') == 'Cits' ? 'selected' : '' }}>Cits</option>
                                </select>
                            </div>

                            <div>
                                <label for="new-account-comments" class="block text-gray-700 text-sm font-bold mb-2">Papildus komentārs:</label>
                                <textarea
                                    name="comments"
                                    id="new-account-comments"
                                    placeholder="brīvs komentārs"
                                    class="h-[46px] w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3"
                                >{{ old('comments') }}</textarea>
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="bg-moss text-white rounded-md py-2 px-4 text-sm hover:bg-[#76A392]">
                                Pievienot kontu
                            </button>
                        </div>
                    </form>
                </div>
            @endif



    <!-- devices -->
            <p class="welcome-text text-sm">
            <h2 class="text-l font-semibold mb-4 text-center" id="digitalas-ierices">Digitālās ierīces</h2>
                Liela daļa mūsu informācijas glabājas mūsu izmantotajās ierīcēs - bieži vien šīs ierīces satur mūsu tuviniekiem nozīmīgu informāciju, tāpēc ir jāpadomā par to, kā viņi varēs šīm ierīcēm piekļūt pēc mūsu nāves. Šajā sadaļā norādi informāciju par savu datoru, planšeti, telefonu, ārējiem cietajiem diskiem, u.c. Iesakām atsevišķi norādīt komentārā, ja ierīcē glabājas kas īpaši vērtīgs, ko būtu iespējams izmantot tālāk - piemēram, oriģinālmāksla, iesākti projekti vai mūzika.
            </p>
            <div class="mb-4">
                <h2 class="text-base font-semibold mb-0" id="device-section">Manas ierīces</h2>
            </div>
            @if($devices->isEmpty())
                <div class="mt-0 bg-gray-50 rounded-lg p-6 text-center text-gray-500">
                    Jums vēl nav nevienas ierīces
                </div>
            @else
            <div class="mt-2">
                @foreach($devices as $device)
                <div class="mb-0 p-6 bg-white">
                    <h2 class="text-xl font-semibold mt-0 mb-0">Ierīce {{ $device->name }}</h2>


                    <form action="{{ route('dashboard.ierices.update', $device->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                            <div>
                                <label for="name-{{ $device->id }}" class="block text-gray-700 text-sm font-bold mb-2">Ierīce:</label>
                                <textarea
                                    name="name"
                                    id="name-{{ $device->id }}"
                                    class="h-[46px] w-full p-3 border border-gray-300 rounded-md text-sm focus:border-lime-600 focus:ring-lime-600"
                                    required
                                >{{ $device->name }}</textarea>
                            </div>

                            <div>
                                <label for="importance-{{ $device->id }}" class="block text-gray-700 text-sm font-bold mb-2">Ierīces nozīmīgums:</label>
                                <select name="importance" id="importance-{{ $device->id }}" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
                                    <option disabled {{ empty($device->importance) ? 'selected' : '' }} value="">Informācijas svarīgums</option>
                                    <option value="Ļoti svarīga" {{ $device->importance == 'Ļoti svarīga' ? 'selected' : '' }}>Ļoti svarīga</option>
                                    <option value="Diezgan svarīga" {{ $device->importance == 'Diezgan svarīga' ? 'selected' : '' }}>Diezgan svarīga</option>
                                    <option value="Mazsvarīga" {{ $device->importance == 'Mazsvarīga' ? 'selected' : '' }}>Mazsvarīga</option>
                                </select>
                            </div>

                            <div>
                                <label for="access_method-{{ $device->id }}" class="block text-gray-700 text-sm font-bold mb-2">Piekļuve ierīcei:</label>
                                <select name="access_method" id="access_method-{{ $device->id }}" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
                                    <option disabled {{ empty($device->access_method) ? 'selected' : '' }} value="">Kā piekļūt ierīcei?</option>
                                    <option value="Ierīcei nav paroles" {{ $device->access_method == 'Ierīcei nav paroles' ? 'selected' : '' }}>Ierīcei nav paroles</option>
                                    <option value="Ierakstīju piekļuves datus Lastpass vai citā rīkā" {{ $device->access_method == 'Ierakstīju piekļuves datus Lastpass vai citā rīkā' ? 'selected' : '' }}>Ierakstīju piekļuves datus Lastpass vai citā rīkā</option>
                                    <option value="Uzrakstīju piekļuves datus uz papīra lapas" {{ $device->access_method == 'Uzrakstīju piekļuves datus uz papīra lapas' ? 'selected' : '' }}>Uzrakstīju piekļuves datus uz papīra lapas</option>
                                    <option value="Neko neizdarīju" {{ $device->access_method == 'Neko neizdarīju' ? 'selected' : '' }}>Neko neizdarīju</option>
                                    <option value="Cits" {{ $device->access_method == 'Cits' ? 'selected' : '' }}>Cits</option>
                                </select>
                            </div>

                            <div>
                                <label for="action_after_death-{{ $device->id }}" class="block text-gray-700 text-sm font-bold mb-2">Ko darīt ar ierīci?</label>
                                <select name="action_after_death" id="action_after_death-{{ $device->id }}" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
                                    <option disabled {{ empty($device->action_after_death) ? 'selected' : '' }} value="">Ko darīt ar ierīci?</option>
                                    <option value="Nekavējoties visu informāciju dzēst" {{ $device->action_after_death == 'Nekavējoties visu informāciju dzēst' ? 'selected' : '' }}>Nekavējoties visu informāciju dzēst</option>
                                    <option value="Pārskatīt tikai konkrētu informāciju (sīkāk komentārā)" {{ $device->action_after_death == 'Pārskatīt tikai konkrētu informāciju (sīkāk komentārā)' ? 'selected' : '' }}>Pārskatīt tikai konkrētu informāciju (sīkāk komentārā)</option>
                                    <option value="Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga" {{ $device->action_after_death == 'Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga' ? 'selected' : '' }}>Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga</option>
                                    <option value="Neko nedarīt" {{ $device->action_after_death == 'Neko nedarīt' ? 'selected' : '' }}>Neko nedarīt</option>
                                    <option value="Cits" {{ $device->action_after_death == 'Cits' ? 'selected' : '' }}>Cits</option>
                                </select>
                            </div>

                            <div>
                                <label for="comments-{{ $device->id }}" class="block text-gray-700 text-sm font-bold mb-2">Papildus komentārs:</label>
                                <textarea
                                    name="comments"
                                    id="comments-{{ $device->id }}"
                                    class="h-[46px] w-full p-3 border border-gray-300 rounded-md text-sm focus:border-lime-600 focus:ring-lime-600"
                                    placeholder="brīvs komentārs"
                                >{{ $device->comments }}</textarea>
                            </div>
                        </div>

                        <div class="flex justify-between items-center mt-6">
                            <button type="submit" class="bg-moss text-white rounded-md py-2 px-4 text-sm hover:bg-moss/80">
                                Saglabāt izmaiņas
                            </button>

                            <button type="button" onclick="if(confirm('Vai tiešām vēlaties dzēst šo ierīci?')) document.getElementById('delete-form-{{ $device->id }}').submit();" class="bg-[#D6A2B5] text-white rounded-md py-2 px-4 text-sm hover:bg-[#D6A2B5]/80">
                                Dzēst
                            </button>
                        </div>
                    </form>

                    <form id="delete-form-{{ $device->id }}" action="{{ route('dashboard.ierices.destroy', $device->id) }}" method="POST" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                @endforeach
            </div>
            @endif

            @if($devices->count() < 20)
                <div class="mb-8 p-6 bg-white rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-4">Pievienot jaunu ierīci</h2>
            <form action="{{ route('dashboard.ierices.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div>
            <label for="new-name" class="block text-gray-700 text-sm font-bold mb-2">Ierīce:</label>
            <textarea
            name="name"
            id="new-name"
            value="{{ old('name') }}"
            placeholder="Ierīce"
            class="h-[46px] w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3"
            required
            >{{ old('name') }}</textarea>
                </div>

            <div>
            <label for="new-importance" class="block text-gray-700 text-sm font-bold mb-2">Ierīces nozīmīgums:</label>
            <select name="importance" id="new-importance" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
            <option disabled selected value="">Informācijas svarīgums</option>
            <option value="Ļoti svarīga" {{ old('importance') == 'Ļoti svarīga' ? 'selected' : '' }}>Ļoti svarīga</option>
            <option value="Diezgan svarīga" {{ old('importance') == 'Diezgan svarīga' ? 'selected' : '' }}>Diezgan svarīga</option>
            <option value="Mazsvarīga" {{ old('importance') == 'Mazsvarīga' ? 'selected' : '' }}>Mazsvarīga</option>
        </select>
    </div>

    <div>
    <label for="new-access_method" class="block text-gray-700 text-sm font-bold mb-2">Piekļuve ierīcei:</label>
    <select name="access_method" id="new-access_method" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
    <option disabled selected value="">Kā piekļūt ierīcei?</option>
    <option value="Ierīcei nav paroles" {{ old('access_method') == 'Ierīcei nav paroles' ? 'selected' : '' }}>Ierīcei nav paroles</option>
    <option value="Ierakstīju piekļuves datus Lastpass vai citā rīkā" {{ old('access_method') == 'Ierakstīju piekļuves datus Lastpass vai citā rīkā' ? 'selected' : '' }}>Ierakstīju piekļuves datus Lastpass vai citā rīkā</option>
    <option value="Uzrakstīju piekļuves datus uz papīra lapas" {{ old('access_method') == 'Uzrakstīju piekļuves datus uz papīra lapas' ? 'selected' : '' }}>Uzrakstīju piekļuves datus uz papīra lapas</option>
    <option value="Neko neizdarīju" {{ old('access_method') == 'Neko neizdarīju' ? 'selected' : '' }}>Neko neizdarīju</option>
    <option value="Cits" {{ old('access_method') == 'Cits' ? 'selected' : '' }}>Cits</option>
</select>
                                        </div>

                                        <div>
                                            <label for="new-action_after_death" class="block text-gray-700 text-sm font-bold mb-2">Ko darīt ar ierīci?</label>
                                            <select name="action_after_death" id="new-action_after_death" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
                                                <option disabled selected value="">Ko darīt ar ierīci?</option>
                                                <option value="Nekavējoties visu informāciju dzēst" {{ old('action_after_death') == 'Nekavējoties visu informāciju dzēst' ? 'selected' : '' }}>Nekavējoties visu informāciju dzēst</option>
                                                <option value="Pārskatīt tikai konkrētu informāciju (sīkāk komentārā)" {{ old('action_after_death') == 'Pārskatīt tikai konkrētu informāciju (sīkāk komentārā)' ? 'selected' : '' }}>Pārskatīt tikai konkrētu informāciju (sīkāk komentārā)</option>
                                                <option value="Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga" {{ old('action_after_death') == 'Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga' ? 'selected' : '' }}>Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga</option>
                                                <option value="Neko nedarīt" {{ old('action_after_death') == 'Neko nedarīt' ? 'selected' : '' }}>Neko nedarīt</option>
                                                <option value="Cits" {{ old('action_after_death') == 'Cits' ? 'selected' : '' }}>Cits</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label for="new-comments" class="block text-gray-700 text-sm font-bold mb-2">Papildus komentārs:</label>
                                            <textarea
                                                name="comments"
                                                id="new-comments"
                                                placeholder="brīvs komentārs"
                                                class="h-[46px] w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3"
                                            >{{ old('comments') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="flex justify-end mt-6">
                                        <button type="submit" class="bg-moss text-white rounded-md py-2 px-4 text-sm hover:bg-[#76A392]">
                                            Pievienot ierīci
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endif
                </div>



    <!-- platforms -->
            <p class="welcome-text text-sm">
            <h2 class="text-l font-semibold mb-4 text-center text-center" id="darbs-dokumenti">Darbs un dokumenti</h2>
            <br>
            Arvien vairāk cilvēku individuāli pelna naudu digitālajā vidē, un Tavu darba platformu piekļuves pazaudēšana var rezultēties pazaudētos vai neapgūtos finanšu līdzekļos. Ja esi šāda tipa darba veicējs, šajā sadaļā norādi būtiskāko informāciju par savām biznesa platformām.<br>
            Starp populārākajām platformām varam nosaukt Etsy, AndeleMandele, Shopify, Printful, Onlyfans, eBay, Amazon pārdošana, ss.com, 99designs, Imgur un vēl.<br>
            </p>
            <div class="mb-4">
            <h2 class="text-base font-semibold mb-0" id="platforms-section">Manas platformas</h2>
            </div>
            @if($platforms->isEmpty())
                <div class="mt-0 bg-gray-50 rounded-lg p-6 text-center text-gray-500">
                    Jums vēl nav nevienas platformas
                </div>
            @else
                <div class="mt-2">
                    @foreach($platforms as $platform)
                    <div class="mb-0 p-6 bg-white">
                        <h2 class="text-xl font-semibold mt-0 mb-0">Platforma {{ $platform->name }}</h2>

                        <form action="{{ route('dashboard.platforms.update', $platform->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                                <div>
                                    <label for="name-{{ $platform->id }}" class="block text-gray-700 text-sm font-bold mb-2">Platforma:</label>
                                    <textarea
                                        name="name"
                                        id="name-{{ $platform->id }}"
                                        class="h-[46px] w-full p-3 border border-gray-300 rounded-md text-sm focus:border-lime-600 focus:ring-lime-600"
                                        required
                                    >{{ $platform->name }}</textarea>
                                </div>

                                <div>
                                    <label for="importance-{{ $platform->id }}" class="block text-gray-700 text-sm font-bold mb-2">Platformas nozīmīgums:</label>
                                    <select name="importance" id="importance-{{ $platform->id }}" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
                                        <option disabled {{ empty($platform->importance) ? 'selected' : '' }} value="">Informācijas svarīgums</option>
                                        <option value="Ļoti svarīga" {{ $platform->importance == 'Ļoti svarīga' ? 'selected' : '' }}>Ļoti svarīga</option>
                                        <option value="Diezgan svarīga" {{ $platform->importance == 'Diezgan svarīga' ? 'selected' : '' }}>Diezgan svarīga</option>
                                        <option value="Mazsvarīga" {{ $platform->importance == 'Mazsvarīga' ? 'selected' : '' }}>Mazsvarīga</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="access_method-{{ $platform->id }}" class="block text-gray-700 text-sm font-bold mb-2">Piekļuve platformai:</label>
                                    <select name="access_method" id="access_method-{{ $platform->id }}" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
                                        <option disabled {{ empty($platform->access_method) ? 'selected' : '' }} value="">Kā piekļūt platformai?</option>
                                        <option value="Platformai nav paroles" {{ $platform->access_method == 'Platformai nav paroles' ? 'selected' : '' }}>Platformai nav paroles</option>
                                        <option value="Ierakstīju piekļuves datus Lastpass vai citā rīkā" {{ $platform->access_method == 'Ierakstīju piekļuves datus Lastpass vai citā rīkā' ? 'selected' : '' }}>Ierakstīju piekļuves datus Lastpass vai citā rīkā</option>
                                        <option value="Uzrakstīju piekļuves datus uz papīra lapas" {{ $platform->access_method == 'Uzrakstīju piekļuves datus uz papīra lapas' ? 'selected' : '' }}>Uzrakstīju piekļuves datus uz papīra lapas</option>
                                        <option value="Neko neizdarīju" {{ $platform->access_method == 'Neko neizdarīju' ? 'selected' : '' }}>Neko neizdarīju</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="action_after_death-{{ $platform->id }}" class="block text-gray-700 text-sm font-bold mb-2">Ko darīt ar platformu?</label>
                                    <select name="action_after_death" id="action_after_death-{{ $platform->id }}" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
                                        <option disabled {{ empty($platform->action_after_death) ? 'selected' : '' }} value="">Ko darīt ar platformu?</option>
                                        <option value="Nekavējoties visu informāciju dzēst" {{ $platform->action_after_death == 'Nekavējoties visu informāciju dzēst' ? 'selected' : '' }}>Nekavējoties visu informāciju dzēst</option>
                                        <option value="Pārskatīt tikai konkrētu informāciju (sīkāk komentārā)" {{ $platform->action_after_death == 'Pārskatīt tikai konkrētu informāciju (sīkāk komentārā)' ? 'selected' : '' }}>Pārskatīt tikai konkrētu informāciju (sīkāk komentārā)</option>
                                        <option value="Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga" {{ $platform->action_after_death == 'Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga' ? 'selected' : '' }}>Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga</option>
                                        <option value="Neko nedarīt" {{ $platform->action_after_death == 'Neko nedarīt' ? 'selected' : '' }}>Neko nedarīt</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="comments-{{ $platform->id }}" class="block text-gray-700 text-sm font-bold mb-2">Papildus komentārs:</label>
                                    <textarea
                                        name="comments"
                                        id="comments-{{ $platform->id }}"
                                        class="h-[46px] w-full p-3 border border-gray-300 rounded-md text-sm focus:border-lime-600 focus:ring-lime-600"
                                        placeholder="brīvs komentārs"
                                    >{{ $platform->comments }}</textarea>
                                </div>
                            </div>

                            <div class="flex justify-between items-center mt-6">
                                <button type="submit" class="bg-moss text-white rounded-md py-2 px-4 text-sm hover:bg-moss/80">
                                    Saglabāt izmaiņas
                                </button>

                                <button type="button" onclick="if(confirm('Vai tiešām vēlaties dzēst šo platformu?')) document.getElementById('delete-form-{{ $platform->id }}').submit();" class="bg-[#D6A2B5] text-white rounded-md py-2 px-4 text-sm hover:bg-[#D6A2B5]/80">
                                    Dzēst
                                </button>
                            </div>
                        </form>

                        <form id="delete-form-{{ $platform->id }}" action="{{ route('dashboard.platforms.destroy', $platform->id) }}" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                    @endforeach
                </div>
            @endif

            @if($platforms->count() < 20)
                <div class="mb-8 p-6 bg-white rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold mb-4">Pievienot jaunu platformu</h2>
                    <form action="{{ route('dashboard.platforms.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                            <div>
                                <label for="new-name" class="block text-gray-700 text-sm font-bold mb-2">Platforma:</label>
                                <textarea
                                    name="name"
                                    id="new-name"
                                    value="{{ old('name') }}"
                                    placeholder="Platforma"
                                    class="h-[46px] w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3"
                                    required
                                >{{ old('name') }}</textarea>
                            </div>

                            <div>
                                <label for="new-importance" class="block text-gray-700 text-sm font-bold mb-2">Platformas nozīmīgums:</label>
                                <select name="importance" id="new-importance" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
                                    <option disabled selected value="">Informācijas svarīgums</option>
                                    <option value="Ļoti svarīga" {{ old('importance') == 'Ļoti svarīga' ? 'selected' : '' }}>Ļoti svarīga</option>
                                    <option value="Diezgan svarīga" {{ old('importance') == 'Diezgan svarīga' ? 'selected' : '' }}>Diezgan svarīga</option>
                                    <option value="Mazsvarīga" {{ old('importance') == 'Mazsvarīga' ? 'selected' : '' }}>Mazsvarīga</option>
                                </select>
                            </div>

                            <div>
                                <label for="new-access_method" class="block text-gray-700 text-sm font-bold mb-2">Piekļuve platformai:</label>
                                <select name="access_method" id="new-access_method" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
                                    <option disabled selected value="">Kā piekļūt platformai?</option>
                                    <option value="Platformai nav paroles" {{ old('access_method') == 'Platformai nav paroles' ? 'selected' : '' }}>Platformai nav paroles</option>
                                    <option value="Ierakstīju piekļuves datus Lastpass vai citā rīkā" {{ old('access_method') == 'Ierakstīju piekļuves datus Lastpass vai citā rīkā' ? 'selected' : '' }}>Ierakstīju piekļuves datus Lastpass vai citā rīkā</option>
                                    <option value="Uzrakstīju piekļuves datus uz papīra lapas" {{ old('access_method') == 'Uzrakstīju piekļuves datus uz papīra lapas' ? 'selected' : '' }}>Uzrakstīju piekļuves datus uz papīra lapas</option>
                                    <option value="Neko neizdarīju" {{ old('access_method') == 'Neko neizdarīju' ? 'selected' : '' }}>Neko neizdarīju</option>
                                </select>
                            </div>

                            <div>
                                <label for="new-action_after_death" class="block text-gray-700 text-sm font-bold mb-2">Ko darīt ar platformu?</label>
                                <select name="action_after_death" id="new-action_after_death" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm p-3" required>
                                    <option disabled selected value="">Ko darīt ar platformu?</option>
                                    <option value="Nekavējoties visu informāciju dzēst" {{ old('action_after_death') == 'Nekavējoties visu informāciju dzēst' ? 'selected' : '' }}>Nekavējoties visu informāciju dzēst</option>
                                    <option value="Pārskatīt tikai konkrētu informāciju (sīkāk komentārā)" {{ old('action_after_death') == 'Pārskatīt tikai konkrētu informāciju (sīkāk komentārā)' ? 'selected' : '' }}>Pārskatīt tikai konkrētu informāciju (sīkāk komentārā)</option>
                                    <option value="Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga" {{ old('action_after_death') == 'Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga' ? 'selected' : '' }}>Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga</option>
                                    <option value="Neko nedarīt" {{ old('action_after_death') == 'Neko nedarīt' ? 'selected' : '' }}>Neko nedarīt</option>
                                </select>
                            </div>

                            <div>
                                <label for="new-comments" class="block text-gray-700 text-sm font-bold mb-2">Papildus komentārs:</label>
                                <textarea
                                    name="comments"
                                    id="new-comments"
                                    placeholder="brīvs komentārs"
                                    class="h-[46px] w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3"
                                >{{ old('comments') }}</textarea>
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit" class="bg-moss text-white rounded-md py-2 px-4 text-sm hover:bg-[#76A392]">
                                Pievienot platformu
                            </button>
                        </div>
                    </form>
                </div>
            @endif 




    <!-- Abonaments -->
    <p class="welcome-text text-sm" id="digital-subscriptions">
    <h2 class="text-l font-semibold mb-4 text-center" id="digitalas-ierices">Abonementi </h2>
    </p>
    <p>
        Katram servisam, kas piedāvā kādu pakalpojumu abonementa formātā, ir sava politika saistībā ar to, kā rīkoties pēc lietotāja nāves. To, protams, iespējams pētīt proaktīvi, tomēr mūsu pieredze liecina, ka svarīgākais ir, ka tuviniekiem ir informācija par Taviem aktīvajiem abonementiem. Pēc cilvēka aiziešanas, bankas parasti dažu dienu laikā deaktivizē Tavas bankas kartes, kas nozīmē, ka ilgi par abonementiem jāmaksā nebūs. Tomēr iespējams, ka Tavi tuvinieki vēlēsies atskatīties uz Tevis veidotajiem Spotify dziesmu sarakstiem.<br>
        Visbiežāk, rīkiem tuvinieki var piekļūt tad, ja viņiem ir piekļuve Tavam epasta kontam, ar ko esi šos pakalpojumus abonējis (izmantojot paroles atjaunošanas funkciju).<br>
        <br>
        <b>Atzīmē savus abonētos servisus:</b>
    </p>

    <br>

    <form method="POST" action="{{ route('dashboard.abonementi.store') }}" x-data="subscriptionForm()">
        @csrf

        <!-- Subscription Categories -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
            <template x-for="(category, categoryKey) in categories" :key="categoryKey">
                <div class="border border-gray-200 rounded-lg p-4">
                    <h3 class="font-semibold text-gray-900 mb-3" x-text="category.name"></h3>
                    
                    <!-- Predefined Services -->
                    <div class="space-y-2 mb-4">
                        <template x-for="service in category.services" :key="service">
                            <label class="flex items-center text-sm">
                                <input 
                                    type="checkbox" 
                                    :name="'subscriptions[' + categoryKey + '][]'"
                                    :value="service"
                                    x-model="selected[categoryKey]"
                                    class="rounded border-gray-300 text-lime-600 focus:ring-lime-500 mr-2"
                                >
                                <span x-text="service"></span>
                            </label>
                        </template>
                    </div>
                    
                    <!-- Custom Services -->
                    <div class="space-y-2 mb-3">
                        <template x-for="(service, index) in customServices[categoryKey]" :key="index">
                            <div class="flex items-center justify-between text-sm">
                                <label class="flex items-center flex-1">
                                    <input 
                                        type="checkbox" 
                                        :name="'subscriptions[' + categoryKey + '][]'"
                                        :value="service"
                                        checked
                                        class="rounded border-gray-300 text-lime-600 focus:ring-lime-500 mr-2"
                                    >
                                    <span x-text="service" class="italic text-gray-700"></span>
                                </label>
                                <button 
                                    type="button" 
                                    @click="removeCustomService(categoryKey, index)"
                                    class="text-red-500 hover:text-red-700 ml-2"
                                >
                                    ✕
                                </button>
                            </div>
                        </template>
                    </div>
                    
                    <!-- Add Custom Service -->
                    <div class="flex items-center mt-2">
                        <input 
                            type="text" 
                            x-model="newService[categoryKey]"
                            @keyup.enter="addCustomService(categoryKey)"
                            placeholder="Pievienot servisu..."
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm"
                        >
                        <button 
                            type="button" 
                            @click="addCustomService(categoryKey)"
                            class="ml-2 bg-lime-600 hover:bg-lime-700 text-white font-bold py-2 px-3 rounded focus:outline-none focus:shadow-outline"
                        >
                            +
                        </button>
                    </div>
                </div>
            </template>
        </div>
        
        <!-- Submit -->
        <div class="text-center">
            <button 
                type="submit" 
                class="px-6 py-2 bg-lime-600 text-white font-medium rounded hover:bg-lime-700 focus:outline-none focus:ring-2 focus:ring-lime-500 focus:ring-offset-2"
            >
                Saglabāt abonementus
            </button>
        </div>
    </form>

    <form action="{{ route('dashboard.digmantojums.save') }}" method="POST">
        @csrf
    <!-- bottom navigation -->

            <div class="w-full max-w-screen-lg mx-auto px-4 py-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <a href="{{ route('dashboard.testaments') }}"
            class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                Atpakaļ
            </a>

            <div class="flex items-center gap-4">
                <label class="flex items-center gap-2 text-gray-700 text-sm font-medium cursor-pointer select-none">
                    <input type="checkbox"
                        id="section_completed"
                        name="submission"
                        value="1"
                        class="form-checkbox h-5 w-5 text-lime-600 rounded focus:ring-lime-500"
                                {{ (isset($submission) && $submission === 1) ? 'checked' : '' }}>
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
<script>
    
document.addEventListener('DOMContentLoaded', function() {
const checkbox = document.getElementById('section_completed');
const hiddenInput = document.getElementById('completion_hidden_input');

checkbox.addEventListener('change', function() {
    hiddenInput.value = this.checked ? 1 : 0;
});

// Set initial value based on current state
hiddenInput.value = checkbox.checked ? 1 : 0;
}); 

    document.querySelectorAll('select[required],textarea[required]').forEach(function(select) {
        select.addEventListener('invalid', function() {
        this.setCustomValidity('Šis lauks ir obligāts.');
        });
        select.addEventListener('change', function() {
        this.setCustomValidity('');
        });
    });

function subscriptionForm() {
    return {
        categories: {
            movies_series: {
                name: 'Filmas un seriāli',
                services: ['Netflix', 'Go3', 'Disney+', 'Tet TV+', 'Apple TV+']
            },
            music: {
                name: 'Mūzika', 
                services: ['Spotify', 'Youtube Premium', 'Apple Music', 'SoundCloud']
            },
            data_storage: {
                name: 'Datu uzglabāšana',
                services: ['Google One', 'iCloud', 'Dropbox', 'OneDrive']
            },
            productivity: {
                name: 'Produktivitāte',
                services: ['Tildes Jumis', 'Canva Pro', 'Adobe', 'Microsoft 365', 'Grammarly']
            }
        },
        
        // Current selections for predefined services
        selected: {
            movies_series: [],
            music: [],
            data_storage: [],
            productivity: []
        },
        
        // Custom services added by user
        customServices: {
            movies_series: [],
            music: [],
            data_storage: [],
            productivity: []
        },
        
        // Input fields for new services
        newService: {
            movies_series: '',
            music: '',
            data_storage: '',
            productivity: ''
        },
        
        addCustomService(categoryKey) {
            const service = this.newService[categoryKey].trim();
            if (!service) return;
            
            // Check if already exists
            if (this.categories[categoryKey].services.includes(service) || 
                this.customServices[categoryKey].includes(service)) {
                alert('Šis pakalpojums jau eksistē!');
                return;
            }
            
            this.customServices[categoryKey].push(service);
            this.newService[categoryKey] = '';
        },
        
        removeCustomService(categoryKey, index) {
            this.customServices[categoryKey].splice(index, 1);
        },
        
        // Initialize with existing data from Laravel
        init() {
            const existingSubscriptions = @json($subscriptions ?? []);
            
            // Populate existing selections
            for (const [categoryKey, services] of Object.entries(existingSubscriptions)) {
                if (this.categories[categoryKey]) {
                    // Separate predefined from custom services
                    const predefinedServices = this.categories[categoryKey].services;
                    const predefined = services.filter(service => predefinedServices.includes(service));
                    const custom = services.filter(service => !predefinedServices.includes(service));
                    
                    this.selected[categoryKey] = predefined;
                    this.customServices[categoryKey] = custom;
                }
            }
        }
    }
}
</script>
</section>
@endsection