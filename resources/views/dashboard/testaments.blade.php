@extends('layouts.app_layout_with_navbar')

@section('title', 'Testamenta sagatavošana')

@section('main_content')

@include('components.mini-tab-navbar')
<section class="welcome-section">
    <br>
    <h1 class="welcome-title px-8">Kādēļ veidot testamentu?</h1>
    <p class="welcome-text text-sm p-8">
    Tas ir veids kā vari izmantot savu rīcībspēju jau pēc aiziešanas: testaments ir tuvākā lieta garantijai, ka Tev piederošais pēc aiziešanas tiks sadalīts pēc Tavām vēlmēm, ja vien nevēlies, lai Tava manta tiktu sadalīta pēc likuma (to likumā noteiktās proporcijās iegūst likumiskie mantinieki – laulātais un bērni, vecāki, īstie brāļi un māsas vai noteiktā secībā tālāki radinieki). Ja vēlies mantu dalīt citādās proporcijās, novēlēt draugam vai labdarības organizācijai, testaments ir nepieciešams.<br>
    <br>
    <br>Sakām ''tuvākā lieta garantijai'', jo likumā ir paredzēti neatstumjamie mantinieki - laulātais un bērni, bet, ja nav bērnu, tad laulātais un vecāki. <b>Vai ir vērts sastādīt testamentu, ja tuvinieki, kuriem neesi paredzējis neko atstāt, pēc likuma var pieprasīt savu neatņemamo daļu?</b> Noteikti, jo neatņemamā daļa ir tikai puse no tā, ko mantinieks saņemtu, ja testaments nebūtu izveidots vispār. Piemēram, ja Tev ir draudzene un dēls kā vienīgais neatraidāmais mantinieks, un Tu visu mantu vēlies atstāt draudzenei, bet dēls nolemj pieprasīt savu neatņemamo daļu, tad gan dēlam, gan draudzenei piešķirami 50% no Tavas mantas. Pretējā gadījumā 100% no Tavas mantas mantotu dēls.<br>
    Atsevišķos likumā noteiktos gadījumos ir iespējams neatraidāmo mantinieku atstumt (konkrētos iemeslus aprakstot testamentā). Ja tiek sagatavots testaments vai slēgts mantojuma līgums, tad, ierakstot īpašumu zemesgrāmatā, jāmaksā mazākas valsts nodevas (0,125% no mantojamās mantas vērtības), nekā īpašumu mantojot pēc likuma.<br>
    <br>
    Ja tiek sagatavots testaments vai slēgts mantojuma līgums, tad, ierakstot īpašumu zemesgrāmatā, jāmaksā mazākas valsts nodevas (0,125% no mantojamās mantas vērtības), nekā īpašumu mantojot pēc likuma.<br>
    </p>
    <div class="green-links">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start text-sm p-8"> 
            <p>
            <b>Publiskais testaments</b><br>
            <br>
            Savu testamentu var <b>sagatavot pie notāra un reģistrēt Latvijas notāru sistēmā</b> (to sauc par publisku testamentu). Tā esamību var pārbaudīt pie jebkura zvērināta notāra un tas ir neapstrīdams.<br>
            ''Neapstrīdams'' gan nenozīmē, ka likumā noteikti neatstumjamie mantinieki nevar pieprasīt savu daļu, tomēr notārs palīdz pārliecināties par to, ka testaments ir korekti noformēts un šajā gadījumā tuvinieki nevar apstrīdēt Tavu rīcībspēju. <br>
            <br>
            Tāpat, šādam testamentam pēc Tavas aiziešanas varēs piekļūt ne tikai notāri Latvijā, bet arī citās Eiropas Savienības valstīs, nodrošinot, ka Tava griba tiks izpildīta arī tad, ja savu mūža nogali izvēlēties pavadīt citā Eiropas valstī.<br>
            <br>
            <b>Izveidot testamentu pie notāra ir ļoti vienkārši,</b> taču jāņem vērā, ka tas ir maksas pakalpojums. 2025. gada aprīlī šāda pakalpojuma izmaksas (gan sastādīšana, gan uzglabāšana reģistrā) bija aptuveni 65 eiro. Jārēķinās, ka, lai testamentā veiktu izmaiņas, ik reizi būs jāvēršas pie notāra.<br>
            <br>
            Visvienkāršāk noorganizēt notāra vizīti ir caur platformu latvijasnotars.lv (pieejamas gan klātienes, gan tiešsaistes tikšanās), taču iespējams arī vērsties pie izvēlētā zvērinātā notāra bez šīs platformas starpniecības, ja kontaktus esi atradis citviet - piemēram, caur paziņu ieteikumiem.Ja iespējas atļauj, mēs rekomendējam veidot testamentu pie notāra, tomēr, ja tādas vēlmes nav, Tu vari izvēlēties slēgt mantojuma līgumu vai sagatavot privāto testamentu (par tā izveidi lasi tālāk šajā sadaļā).<br>
            <br>
            Ja iespējas atļauj, mēs rekomendējam veidot testamentu pie notāra, tomēr, ja tādas vēlmes nav, Tu vari izvēlēties slēgt mantojuma līgumu vai sagatavot privāto testamentu (par tā izveidi lasi tālāk šajā sadaļā).<br>
            </p>
            
            <p>
            <b>Privātais testaments </b><br>
            <br>
            Pastāv iespēja sagatavot privātu testamentu <b>(rakstīts ar roku, parakstīts un glabāts mājās vai citā tuvā vietā),</b> ko tuvinieki pēc Tavas aiziešanas nodos notāram, lai tas uzsāktu mantojuma lietu. Testamentā iespējams noteikt mantiniekus jebkurai sev kustamai vai nekustamai mantai, un pat dzīvniekiem. Tā īstums, tai skaitā aizgājēja rīcībspēja un izteiktie novēlējumi, pēc nāves var tikt apstrīdēts (piemēram, apšaubot, vai Tu esi bijis rīcībspējīgs testamenta sagatavošanas brīdī). Tāpat testamentā norādītais var nebūt izpildāms, ja ir pretrunā ar valsts likumos noteikto.<br>
            Ja ir bažas par to, vai testaments īstajā brīdī tiks atrasts, ir iespējams to ievietot slēgtā aploksnē un nodot glabāšanā notāram (šajā gadījumā aicinām vērsties pie konkrēta notāra platformā latvijasnotars.lv un izrunāt detaļas).<br>
            <br>
            <b>Mantojuma līgums</b><br>
            <br>
            Ja esi pilnīgi pārliecināts, kam vēlies atstāt, piemēram, piederošu īpašumu, ir vērts apsvērt mantojuma līgumu. Šo iespēju bieži izvēlās cilvēki gados, kas ir noraizējušies, ka dažādu slimību saasinājumu ietekmē tie var kļūt par krāpniecības upuriem (šāds līgums nodrošinātu, ka seniors nevar mainīt savu gribu par konkrēto mantojuma daļu bez mantojuma līgumā ierakstītās personas klātbūtnes).<br>
            Mantojuma līgums ir juridisks līgums, ar kuru persona (mantojuma atstājējs) <b>dzīves laikā vienojas ar citu personu,</b> ka pēc viņa nāves šī persona iegūs noteiktu mantu vai visu mantojumu. Šis līgums <b>stājas spēkā tikai pēc mantojuma atstājēja nāves,</b> bet tas ir <b>saistošs un neatceļams</b>, ja nav abpusējas vienošanās to izbeigt. Arī šajā gadījumā nāksies vērsties <b>pie notāra</b> - civillikums nosaka, ka mantojuma līgums ir notariāli jāapliecina.<br>
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start text-sm p-8">
         <div class="space-y-4">
            <p><b>Būtiskākās lietas, ko ievērot, rakstot savu privāto testamentu:</b></p>
            <ol class="list-decimal list-inside space-y-2">
                <li>Jātop skaidram, ka privāto testamentu esi sagatavojusi Tu, un tajā precīzi atspoguļota tieši Tava pēdējā griba.</li>
                <li>Bez paraksta privātais testaments nav derīgs.</li>
                <li>Tam obligāti ir jābūt rakstītam ar roku - kopš 2014. gada, datorrakstā sagatavoti testamenti nav derīgi</li>
                <li>Testamentu var rakstīt jebkurā valodā</li>
                <li>Ja testamentā tiek veikti labojumi (piemēram, kaut kas tiek svītrots), tas ir papildus jāapliecina kā ar nodomu labots - piemēram, pierakstot klāt ''labotam ticēt'' un parakstu, vai arī testamenta beigās aprakstot augstāk veiktos labojumus. Citādi notārs nevarēs pārliecināties, ka šos labojumus nav veicis kāds cits, un neņems tos vērā.</li>
                <li>Katru mantinieku, ko esi iekļāvis testamentā, ir nepieciešams pienācīgi identificēt (norādot personas kodu)</li>
            </ol>
            <div class="green-links">
                <p>ℹ️ Noderīgi resursi:</p>
                <br>
                Padomi:<br><a href="https://lvportals.lv/skaidrojumi/353422-ka-sakartot-mantojumu-lai-izvairitos-no-nepatikamiem-parsteigumiem-2023" target="_blank" rel="noopener noreferrer">
                     https://lvportals.lv/skaidrojumi/353422-ka-sakartot-mantojumu-lai-izvairitos-no-nepatikamiem-parsteigumiem-2023
                </a><br>
                <br>
                Par neatņemamās daļas tiesīgajiem: <br><a href="https://lvportals.lv/tiesas/369977-sagatavojot-testamentu-vai-mantojuma-ligumu-jaatceras-par-neatnemamas-dalas-tiesigajiem-2024" target="_blank" rel="noopener noreferrer">
                     https://lvportals.lv/tiesas/369977-sagatavojot-testamentu-vai-mantojuma-ligumu-jaatceras-par-neatnemamas-dalas-tiesigajiem-2024
                </a><br>
                <br>
                Par izmaiņām mantojuma likumā (2025):<br><a href="https://lvportals.lv/viedokli/373636-mantojums-nepienakas-automatiski-saruna-par-mantojuma-tiesibam-pec-reformas-2025" target="_blank" rel="noopener noreferrer">
                     https://lvportals.lv/viedokli/373636-mantojums-nepienakas-automatiski-saruna-par-mantojuma-tiesibam-pec-reformas-2025
                </a><br>
                <br>
                Vienkārši par mantojuma līgumu:<br><a href="https://www.lsm.lv/raksts/dzive--stils/ikdienai/ar-ko-mantojuma-ligums-atskiras-no-testamenta-skaidro-zverinata-notare.a461601/" target="_blank" rel="noopener noreferrer">
                     https://www.lsm.lv/raksts/dzive--stils/ikdienai/ar-ko-mantojuma-ligums-atskiras-no-testamenta-skaidro-zverinata-notare.a461601/
                </a>
            </div>
            <form action="{{ route('dashboard.testaments.save') }}" method="POST">
            @csrf
            <p><b>Lai pabeigtu šo sadaļu, atzīmē vienu no izvēlēm:</b>
                <br>
                <br>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="responses[200][response_value]" id="testament_200" value="1"
                        class="testament-checkbox w-6 h-6 mt-[2px] text-lime-600 focus:ring-lime-600 border-gray-300 rounded mb-2"
                        {{ isset($responses[200]) && $responses[200] ? 'checked' : '' }}>
                    <label for="testament_200">Es esmu izveidojis savu publisko testamentu pie notāra</label>
                    <input type="hidden" name="responses[200][question_id]" value="200">
                </div>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="responses[201][response_value]" id="testament_201" value="1"
                        class="testament-checkbox w-6 h-6 mt-[2px] text-lime-600 focus:ring-lime-600 border-gray-300 rounded mb-2"
                        {{ isset($responses[201]) && $responses[201] ? 'checked' : '' }}>
                    <label for="testament_201">Es esmu izveidojis savu privāto testamentu, kas nodots glabāšanā pie notāra</label>
                    <input type="hidden" name="responses[201][question_id]" value="201">
                </div>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="responses[202][response_value]" id="testament_202" value="1"
                        class="testament-checkbox w-6 h-6 mt-[2px] text-lime-600 focus:ring-lime-600 border-gray-300 rounded mb-2"
                        {{ isset($responses[202]) && $responses[202] ? 'checked' : '' }}>
                    <label for="testament_202">Es esmu izveidojis savu privāto testamentu, ko esmu noglabājis citur</label>
                    <input type="hidden" name="responses[202][question_id]" value="202">
                </div>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="responses[203][response_value]" id="testament_203" value="1"
                        class="testament-checkbox w-6 h-6 mt-[2px] text-lime-600 focus:ring-lime-600 border-gray-300 rounded mb-2"
                        {{ isset($responses[203]) && $responses[203] ? 'checked' : '' }}>
                    <label for="testament_203">Es vēlos, lai mana manta tiek sadalīta civillikumā noteiktajā kārtībā</label>
                    <input type="hidden" name="responses[203][question_id]" value="203">
                </div>
                             
            </p>
        </div>

        <div>
            <p><b>Privātā testamenta paraugs</b></p>
            <br>
            Mēs esam izveidojuši nelielu paraugu ar iestrādēm, kas var Tev palīdzēt uzrakstīt akurātu privāto testamentu. Tas noderēs arī tad, ja esi nolēmis doties pie notāra - ir labi, ja esi jau laikus apkopojis visu nepieciešamo identificējošo informāciju. Šis kalpo tikai kā piemērs - lūdzu, esi uzmanīgs, pārskatot visas detaļas.<br>
            <br>
            <img src="{{ asset('images/testamenta_paraugs.jpg') }}" alt="testamenta_paraugs" class="rounded-lg shadow-md" style="width: 100%; height: auto; padding: 10px;">
            <div class="flex justify-center mt-4">
                <button type="download" class="bg-moss hover:bg-lime-600 text-white font-bold py-3 px-6 rounded-md focus:outline-none">
                <a href="{{ asset('documents/testamenta_paraugs.docx') }}" download="testamenta_paraugs.docx" class="text-white">Lejupielādēt paraugu</a>        
                </button>
            </div>
        </div>
    </div>
  

    <!-- Bottom Navigation-->
        <div class="w-full max-w-screen-lg mx-auto px-4 py-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <a href="{{ route('dashboard.finanses') }}"
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

            <!-- Right minimal button -->
            <a href="{{ route('dashboard.digmantojums') }}"
            class="text-gray-600 text-sm border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100">
                Tālāk
            </a>
        </div>
    </form>
    <script>
    document.querySelectorAll('.testament-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            if (this.checked) {
                document.querySelectorAll('.testament-checkbox').forEach(cb => {
                    if (cb !== this) cb.checked = false;
                });
            }
        });
    });
</script>
</section>
@endsection