@extends('layouts.app_layout_with_navbar')

@section('title', 'Digitālais mantojums')

@section('main_content')

@include('components.mini-tab-navbar')
<section class="welcome-section">
    <br>
    <h1 class="welcome-title px-8">Digitālais mantojums</h1>
    <p class="welcome-text text-sm p-8">
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
            <br>
            <h1 class="welcome-title px-8">Sākam darbu!</h1>
            <p>
            <b>Personīgie konti*</b><br>
            <br>
            Šajā sadaļā aicinām Tevi censties atcerēties būtiskākos sociālos un saziņas rīkus, ko izmanto ikdienā, aizpildāmajos laukos norādot savas vēlmes un ar tām saistītās darbības. Starp populārākajiem rīkiem šajā sadaļā varētu būt Facebook, Gmail, Outlook, Instagram, Twitter (X), WhatsApp, Telegram, Signal un TikTok.<br>
            </p>
            <br>
            <div class="grid grid-cols-5 md:grid-cols-5 gap-2 items-stretch  text-sm"> 
                <div>
                    <label class="text-gray-700 text-sm font-semibold mb-1" for="not_wanted">
                        Digitālais konts
                    </label>
                    <textarea name="responses[2][response_value]" id="not_wanted" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3" placeholder="Digitālā rīka vārds">{{ $responses[2] ?? '' }}</textarea>
                    <input type="hidden" name="responses[2][question_id]" value="2">
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-1" for="burial_preference">
                        Konta nozīmīgums
                    </label>
                    <select name="responses[3][response_value]" id="burial_preference" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3">
                        <option disabled {{ empty($responses[3]) ? 'selected' : '' }} value="" class="text-xs">Informācijas svarīgums</option>   
                        <option value="kremācija" {{ ($responses[3] ?? '') == 'kremācija' ? 'selected' : '' }}>Ļoti svarīga</option>
                        <option value="apglabāšana" {{ ($responses[3] ?? '') == 'apglabāšana' ? 'selected' : '' }}>Diezgan svarīga</option>
                        <option value="ķermeņa ziedošana zinātnei" {{ ($responses[3] ?? '') == 'ķermeņa ziedošana zinātnei' ? 'selected' : '' }}>Mazsvarīga</option>
                    </select>
                    <input type="hidden" name="responses[3][question_id]" value="3">
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-1" for="burial_preference">
                        Piekļuve kontam
                    </label>
                    <select name="responses[3][response_value]" id="burial_preference" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3">
                        <option disabled {{ empty($responses[3]) ? 'selected' : '' }} value="">Kā piekļūt kontam?</option>    
                        <option value="kremācija" {{ ($responses[3] ?? '') == 'kremācija' ? 'selected' : '' }}>Izmantoju rīka gatavo risinājumu</option>
                        <option value="apglabāšana" {{ ($responses[3] ?? '') == 'apglabāšana' ? 'selected' : '' }}>Ierakstīju piekļuves datus Lastpass vai citā rīkā</option>
                        <option value="ķermeņa ziedošana zinātnei" {{ ($responses[3] ?? '') == 'ķermeņa ziedošana zinātnei' ? 'selected' : '' }}>Uzrakstīju piekļuves datus uz papīra lapas</option>
                        <option value="cits" {{ ($responses[3] ?? '') == 'cits' ? 'selected' : '' }}>Neko neizdarīju</option>
                    </select>
                    <input type="hidden" name="responses[3][question_id]" value="3">
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-1" for="burial_preference">
                        Ko darīt ar kontu?
                    </label>
                    <select name="responses[3][response_value]" id="burial_preference" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3">
                        <option disabled {{ empty($responses[3]) ? 'selected' : '' }} value="">Ko darīt ar profilu?</option>    
                        <option value="kremācija" {{ ($responses[3] ?? '') == 'kremācija' ? 'selected' : '' }}>Nekavējoties dzēst</option>
                        <option value="apglabāšana" {{ ($responses[3] ?? '') == 'apglabāšana' ? 'selected' : '' }}>Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga</option>
                        <option value="ķermeņa ziedošana zinātnei" {{ ($responses[3] ?? '') == 'ķermeņa ziedošana zinātnei' ? 'selected' : '' }}>Izveidot piemiņas profilu, nepārskatīt informāciju</option>
                        <option value="cits" {{ ($responses[3] ?? '') == 'cits' ? 'selected' : '' }}>Izveidot piemiņas profilu, pārskatīt un saglabāt informāciju</option>
                        <option value="cits" {{ ($responses[3] ?? '') == 'cits' ? 'selected' : '' }}>Neko nedarīt</option>
                    </select>
                    <input type="hidden" name="responses[3][question_id]" value="3">
                </div>

                <div>
                    <label class="text-gray-700 text-sm font-semibold mb-1" for="not_wanted">
                        Papildus komentārs
                    </label>
                    <textarea name="responses[2][response_value]" id="not_wanted" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3" placeholder="brīvs komentārs">{{ $responses[2] ?? '' }}</textarea>
                    <input type="hidden" name="responses[2][question_id]" value="2">
                </div>
            </div>
            <br>


            <p>
            <b>Digitālās ierīces</b><br>
            <br>
            Liela daļa mūsu informācijas glabājas mūsu izmantotajās ierīcēs - bieži vien šīs ierīces satur mūsu tuviniekiem nozīmīgu informāciju, tāpēc ir jāpadomā par to, kā viņi varēs šīm ierīcēm piekļūt pēc mūsu nāves. Šajā sadaļā norādi informāciju par savu datoru, planšeti, telefonu, ārējiem cietajiem diskiem, u.c. Iesakām atsevišķi norādīt komentārā, ja ierīcē glabājas kas īpaši vērtīgs, ko būtu iespējams izmantot tālāk - piemēram, oriģinālmāksla, iesākti projekti vai mūzika.<br>
            </p>
            <br>
            <div class="grid grid-cols-5 md:grid-cols-5 gap-2 items-stretch  text-sm"> 
                <div>
                    <label class="text-gray-700 text-sm font-semibold mb-1" for="not_wanted">
                        Ierīce
                    </label>
                    <textarea name="responses[2][response_value]" id="not_wanted" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3" placeholder="Ierīce">{{ $responses[2] ?? '' }}</textarea>
                    <input type="hidden" name="responses[2][question_id]" value="2">
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-1" for="burial_preference">
                    Ierīces nozīmīgums
                    </label>
                    <select name="responses[3][response_value]" id="burial_preference" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3">
                        <option disabled {{ empty($responses[3]) ? 'selected' : '' }} value="" class="text-xs">Informācijas svarīgums</option>   
                        <option value="kremācija" {{ ($responses[3] ?? '') == 'kremācija' ? 'selected' : '' }}>Ļoti svarīga</option>
                        <option value="apglabāšana" {{ ($responses[3] ?? '') == 'apglabāšana' ? 'selected' : '' }}>Diezgan svarīga</option>
                        <option value="ķermeņa ziedošana zinātnei" {{ ($responses[3] ?? '') == 'ķermeņa ziedošana zinātnei' ? 'selected' : '' }}>Mazsvarīga</option>
                    </select>
                    <input type="hidden" name="responses[3][question_id]" value="3">
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-1" for="burial_preference">
                        Piekļuve ierīcei
                    </label>
                    <select name="responses[3][response_value]" id="burial_preference" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3">
                        <option disabled {{ empty($responses[3]) ? 'selected' : '' }} value="">Kā piekļūt ierīcei?</option>
                        <option value="kremācija" {{ ($responses[3] ?? '') == 'kremācija' ? 'selected' : '' }}>Ierīcei nav paroles</option>
                        <option value="apglabāšana" {{ ($responses[3] ?? '') == 'apglabāšana' ? 'selected' : '' }}>Ierakstīju piekļuves datus Lastpass vai citā rīkā</option>
                        <option value="ķermeņa ziedošana zinātnei" {{ ($responses[3] ?? '') == 'ķermeņa ziedošana zinātnei' ? 'selected' : '' }}>Uzrakstīju piekļuves datus uz papīra lapas</option>
                        <option value="cits" {{ ($responses[3] ?? '') == 'cits' ? 'selected' : '' }}>Neko neizdarīju</option>
                    </select>
                    <input type="hidden" name="responses[3][question_id]" value="3">
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-1" for="burial_preference">
                        Ko darīt ar ierīci?
                    </label>
                    <select name="responses[3][response_value]" id="burial_preference" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3">
                        <option disabled {{ empty($responses[3]) ? 'selected' : '' }} value="">Ko darīt ar ierīci?</option>    
                        <option value="kremācija" {{ ($responses[3] ?? '') == 'kremācija' ? 'selected' : '' }}>Nekavējoties visu informāciju dzēst</option>
                        <option value="apglabāšana" {{ ($responses[3] ?? '') == 'apglabāšana' ? 'selected' : '' }}>Pārskatīt tikai konkrētu informāciju (sīkāk komentārā)</option>
                        <option value="ķermeņa ziedošana zinātnei" {{ ($responses[3] ?? '') == 'ķermeņa ziedošana zinātnei' ? 'selected' : '' }}>Dzēst pēc tam, kad tuvinieki ir saglabājuši informāciju, kas šķiet noderīga</option>
                        <option value="cits" {{ ($responses[3] ?? '') == 'cits' ? 'selected' : '' }}>Neko nedarīt</option>
                    </select>
                    <input type="hidden" name="responses[3][question_id]" value="3">
                </div>

                <div>
                    <label class="text-gray-700 text-sm font-semibold mb-1" for="not_wanted">
                        Papildus komentārs
                    </label>
                    <textarea name="responses[2][response_value]" id="not_wanted" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3" placeholder="brīvs komentārs">{{ $responses[2] ?? '' }}</textarea>
                    <input type="hidden" name="responses[2][question_id]" value="2">
                </div>
            </div>
            <br>

            <p>
            <b>Darbs un dokumenti</b><br>
            <br>
            Arvien vairāk cilvēku individuāli pelna naudu digitālajā vidē, un Tavu darba platformu piekļuves pazaudēšana var rezultēties pazaudētos vai neapgūtos finanšu līdzekļos. Ja esi šāda tipa darba veicējs, šajā sadaļā norādi būtiskāko informāciju par savām biznesa platformām.<br>
            Starp populārākajām platformām varam nosaukt Etsy, AndeleMandele, Shopify, Printful, Onlyfans, eBay, Amazon pārdošana, ss.com, 99designs, Imgur un vēl.<br>
            </p>
            <br>
            <div class="grid grid-cols-5 md:grid-cols-5 gap-2 items-stretch  text-sm"> 
                <div>
                    <label class="text-gray-700 text-sm font-semibold mb-1" for="not_wanted">
                        Platforma
                    </label>
                    <textarea name="responses[2][response_value]" id="not_wanted" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3" placeholder="Platformas nosaukums">{{ $responses[2] ?? '' }}</textarea>
                    <input type="hidden" name="responses[2][question_id]" value="2">
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-1" for="burial_preference">
                    Platformas nozīmīgums
                    </label>
                    <select name="responses[3][response_value]" id="burial_preference" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3">
                        <option disabled {{ empty($responses[3]) ? 'selected' : '' }} value="" class="text-xs">Informācijas svarīgums</option>   
                        <option value="kremācija" {{ ($responses[3] ?? '') == 'kremācija' ? 'selected' : '' }}>Ļoti svarīga</option>
                        <option value="apglabāšana" {{ ($responses[3] ?? '') == 'apglabāšana' ? 'selected' : '' }}>Diezgan svarīga</option>
                        <option value="ķermeņa ziedošana zinātnei" {{ ($responses[3] ?? '') == 'ķermeņa ziedošana zinātnei' ? 'selected' : '' }}>Mazsvarīga</option>
                    </select>
                    <input type="hidden" name="responses[3][question_id]" value="3">
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-1" for="burial_preference">
                        Piekļuve platformai
                    </label>
                    <select name="responses[3][response_value]" id="burial_preference" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3">
                        <option disabled {{ empty($responses[3]) ? 'selected' : '' }} value="">Kā piekļūt platformai?</option>
                        <option value="kremācija" {{ ($responses[3] ?? '') == 'kremācija' ? 'selected' : '' }}>Izmantoju platformas gatavo risinājumu</option>
                        <option value="apglabāšana" {{ ($responses[3] ?? '') == 'apglabāšana' ? 'selected' : '' }}>Ierakstīju piekļuves datus Lastpass vai citā rīkā</option>
                        <option value="ķermeņa ziedošana zinātnei" {{ ($responses[3] ?? '') == 'ķermeņa ziedošana zinātnei' ? 'selected' : '' }}>Uzrakstīju piekļuves datus uz papīra lapas</option>
                        <option value="cits" {{ ($responses[3] ?? '') == 'cits' ? 'selected' : '' }}>Neko neizdarīju</option>
                    </select>
                    <input type="hidden" name="responses[3][question_id]" value="3">
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-1" for="burial_preference">
                        Ko darīt ar platformas kontu?
                    </label>
                    <select name="responses[3][response_value]" id="burial_preference" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3">
                        <option disabled {{ empty($responses[3]) ? 'selected' : '' }} value="">Ko darīt ar kontu?</option>    
                        <option value="kremācija" {{ ($responses[3] ?? '') == 'kremācija' ? 'selected' : '' }}>Nekavējoties visu dzēst un aizvērt</option>
                        <option value="apglabāšana" {{ ($responses[3] ?? '') == 'apglabāšana' ? 'selected' : '' }}>Nodot pārvaldībā tuviniekam (komentārā precizēts)</option>
                        <option value="ķermeņa ziedošana zinātnei" {{ ($responses[3] ?? '') == 'ķermeņa ziedošana zinātnei' ? 'selected' : '' }}>Izpārdot un slēgt</option>
                        <option value="cits" {{ ($responses[3] ?? '') == 'cits' ? 'selected' : '' }}>Neko nedarīt</option>
                    </select>
                    <input type="hidden" name="responses[3][question_id]" value="3">
                </div>

                <div>
                    <label class="text-gray-700 text-sm font-semibold mb-1" for="not_wanted">
                        Papildus komentārs
                    </label>
                    <textarea name="responses[2][response_value]" id="not_wanted" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-3" placeholder="brīvs komentārs">{{ $responses[2] ?? '' }}</textarea>
                    <input type="hidden" name="responses[2][question_id]" value="2">
                </div>
            </div>
            <br>

            <p>
            <b>Abonementi</b><br>
            <br>
            Katram servisam, kas piedāvā kādu pakalpojumu abonementa formātā, ir sava politika saistībā ar to, kā rīkoties pēc lietotāja nāves. To, protams, iespējams pētīt proaktīvi, tomēr mūsu pieredze liecina, ka svarīgākais ir, ka tuviniekiem ir informācija par Taviem aktīvajiem abonementiem. Pēc cilvēka aiziešanas, bankas parasti dažu dienu laikā deaktivizē Tavas bankas kartes, kas nozīmē, ka ilgi par abonementiem jāmaksā nebūs. Tomēr iespējams, ka Tavi tuvinieki vēlēsies atskatīties uz Tevis veidotajiem Spotify dziesmu sarakstiem.<br>
            Visbiežāk, rīkiem tuvinieki var piekļūt tad, ja viņiem ir piekļuve Tavam epasta kontam, ar ko esi šos pakalpojumus abonējis (izmantojot paroles atjaunošanas funkciju).<br>
            <br>
                <b>Atzīmē savus abonētos servisus:</b>
            </p>

            <br>
            <div class="grid grid-cols-5 md:grid-cols-5 gap-2 items-stretch  text-sm"> 
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="finances_online_tools_question">
                        Filmas un seriāli 
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
                            <label for="finances_online_paypal" class="ml-2 text-gray-700">Netflix</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox"
                                name="responses[100][response_value][]"
                                id="finances_online_revolut"
                                value="revolut"
                                class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                                {{ in_array('revolut', $selectedOnlineFinances) ? 'checked' : '' }}>
                            <label for="finances_online_revolut" class="ml-2 text-gray-700">Go3</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox"
                                name="responses[100][response_value][]"
                                id="finances_online_other"
                                value="other" {{-- 'cits' for 'other' --}}
                                class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                                {{ in_array('other', $selectedOnlineFinances) ? 'checked' : '' }}>
                            <label for="finances_online_other" class="ml-2 text-gray-700">Disney+</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox"
                                name="responses[100][response_value][]"
                                id="finances_online_none"
                                value="none" {{-- 'neglabaju' for 'none' --}}
                                class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                                {{ in_array('none', $selectedOnlineFinances) ? 'checked' : '' }}>
                            <label for="finances_online_none" class="ml-2 text-gray-700">Tet TV+</label>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="finances_online_tools_question">
                       Mūzika
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
                            <label for="finances_online_paypal" class="ml-2 text-gray-700">Spotify</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox"
                                name="responses[100][response_value][]"
                                id="finances_online_revolut"
                                value="revolut"
                                class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                                {{ in_array('revolut', $selectedOnlineFinances) ? 'checked' : '' }}>
                            <label for="finances_online_revolut" class="ml-2 text-gray-700">Youtube Premium</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox"
                                name="responses[100][response_value][]"
                                id="finances_online_other"
                                value="other" {{-- 'cits' for 'other' --}}
                                class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                                {{ in_array('other', $selectedOnlineFinances) ? 'checked' : '' }}>
                            <label for="finances_online_other" class="ml-2 text-gray-700">Apple music</label>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="finances_online_tools_question">
                       Datu uzglabāšana
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
                            <label for="finances_online_paypal" class="ml-2 text-gray-700">Google One</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox"
                                name="responses[100][response_value][]"
                                id="finances_online_revolut"
                                value="revolut"
                                class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                                {{ in_array('revolut', $selectedOnlineFinances) ? 'checked' : '' }}>
                            <label for="finances_online_revolut" class="ml-2 text-gray-700">iCloud</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox"
                                name="responses[100][response_value][]"
                                id="finances_online_other"
                                value="other" {{-- 'cits' for 'other' --}}
                                class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                                {{ in_array('other', $selectedOnlineFinances) ? 'checked' : '' }}>
                            <label for="finances_online_other" class="ml-2 text-gray-700">Dropbox</label>
                        </div>
                    </div>
                </div>


                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2" for="finances_online_tools_question">
                       Produktivitātes un citi rīki
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
                            <label for="finances_online_paypal" class="ml-2 text-gray-700">Adobe</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox"
                                name="responses[100][response_value][]"
                                id="finances_online_revolut"
                                value="revolut"
                                class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                                {{ in_array('revolut', $selectedOnlineFinances) ? 'checked' : '' }}>
                            <label for="finances_online_revolut" class="ml-2 text-gray-700">Tildes Jumis</label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox"
                                name="responses[100][response_value][]"
                                id="finances_online_other"
                                value="other" {{-- 'cits' for 'other' --}}
                                class="w-4 h-4 text-lime-600 focus:ring-lime-600 border-gray-300 rounded"
                                {{ in_array('other', $selectedOnlineFinances) ? 'checked' : '' }}>
                            <label for="finances_online_other" class="ml-2 text-gray-700">Canva Pro</label>
                        </div>
                    </div>
                </div>
                 

                <div>
                    <label class="text-gray-700 text-sm font-semibold mb-1" for="not_wanted">
                        Komentārs par abonementiem:
                    </label>
                    <textarea name="responses[2][response_value]" id="not_wanted" class="w-full border border-gray-300 rounded-md shadow-sm focus:border-lime-600 focus:ring-lime-600 text-black-700 text-sm placeholder-gray-400 p-13" placeholder="Norādi šeit informāciju, ja kādā no abonētajiem rīkiem glabājas kas iespējami noderīgs, un, ja esi kaut kur atsevišķi noglabājis paroles, kas ļauj šiem rīkiem piekļūt">{{ $responses[2] ?? '' }}</textarea>
                    <input type="hidden" name="responses[2][question_id]" value="2">
                </div>
            </div>

        </div>
    </div>



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