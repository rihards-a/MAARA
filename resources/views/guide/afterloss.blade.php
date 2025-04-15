@extends('layouts.app_layout_with_navbar')

@section('title', 'Kā rīkoties pēc tuvinieka nāves')

@section('main_content')
<section class="welcome-section">
    <h1 class="welcome-title"> Kā rīkoties pēc tuvinieka nāves</h1>

    <div class="welcome-content">
        <div class="welcome-text">
            <p>
            Pirmie svarīgie soļi pēc tuvinieka aiziešanas – praktiski padomi, kam zvanīt, kā rīkoties un kur vērsties.<br>
            <br>
            <h3>Ja neesat pilnībā pārliecināts par tuvinieka nāvi</h3>
            🔸 Nekavējoties jāizsauc neatliekamās medicīniskās palīdzības brigādi, zvanot uz numuru “113”.<br>
            🔸 Ja tuvinieks ir miris pirms NMP (neatliekamā medicīniskā palīdzība) brigādes ierašanās, tad NMP darbinieks izraksta pagaidu dokumentu par nāves iestāšanos. Uz tā pamata ģimenes ārsts vēlāk izraksta miršanas izziņu.<br>
            🔸 Mirušā transportēšana no mājām uz morgu neietilpst ātrās medicīniskās palīdzības brigādes pienākumos.<br>
            🔸 Jāsazinās ar apbedīšanas biroju, kas nodrošinās mirušā transportēšanu no mājām uz morgu vai citu izvēlētu vietu. Lielākā daļa apbedīšanas pakalpojumu ir pieejami 24/7.<br>
            <br>
            <h3>Ja tuvinieks ir nomiris savās mājās, nāve ir bijusi gaidāma</h3>
            🔸 Jāziņo tuvinieka ģimenes ārstam, kurš konstatēs nāves faktu un izsniegs atbilstošu izziņu.<br>
            🔸 Ja tuvinieks nomiris vēlu vakarā, brīvdienā vai svētku dienā un ģimenes ārsts nav pieejams, jāsazinās ar poliklīnikas dežurējošo ārstu un tuvākās darba dienas rītā jāsazinās ar ģimenes ārstu.<br>
            🔸 Mirušā ģimenes ārsts ir tiesīgs neizrakstīt apliecību par nāves iestāšanos, ja mirušais pēdējā laikā nav ārstu apmeklējis un viņa veselības stāvoklis nav ārstam zināms un līdz ar to nav skaidrs nāves iemesls. Nezināma nāves iemesla gadījumā ģimenes ārsts izsniegs norīkojumu uz autopsiju (sekciju), lai noskaidrotu nāves cēloni.<br>
            🔸 Jāsazinās ar apbedīšanas biroju, kas nodrošinās mirušā transportēšanu no mājām uz morgu vai citu izvēlētu vietu. Lielākā daļa apbedīšanas pakalpojumu ir pieejami 24/7.<br>
            <br>    
            <h3>Ja tuvinieks ir nomiris slimnīcā vai ārstniecības iestādē</h3>
            🔸 Slimnīcas personāls konstatē nāvi un izraksta miršanas izziņu.<br>
            🔸 Slimnīca var uzglabāt ķermeni morgā līdz 72 stundām.<br>
            🔸 Jāsazinās ar apbedīšanas biroju, kas nodrošinās mirušā transportēšanu no slimnīcas uz morgu vai citu izvēlētu vietu. Lielākā daļa apbedīšanas pakalpojumu ir pieejami 24/7.<br>
            <br>
            <h3>Ja ir jebkādas aizdomas par vardarbīgu nāvi vai par neskaidriem nāves apstākļiem (piemēram, konflikta situācija, pašnāvība)</h3>
            🔸 Jāziņo policijai (110).<br>
            🔸 Ja noteikta tiesu medicīniskā ekspertīze, mirušo pārved uz Valsts tiesu medicīnas ekspertīzes centru vai tuvāko Valsts tiesu medicīnas ekspertīzes centra reģionālo nodaļu.<br>
            🔸 Ja tiek veikta mirušā autopsija, medicīnisko izziņu par nāves cēloni var saņemt Valsts tiesu medicīnas ekspertīzes centrā vai tā atbilstošajā reģionālajā nodaļā.<br>
            🔸 Medicīniskās ekspertīzes (izmeklēšanas) kopējais ilgums nedrīkst pārsniegt vienu mēnesi.<br>
            <br>
            <h3>Ja tuvinieks ir nomiris ārzemēs</h3>
            🔸 Tuvinieki var sazināties ar Latvijas Republikas vēstniecību attiecīgajā valstī vai Ārlietu ministrijas Konsulāro departamentu, lai saņemtu informāciju par tālāku rīcību.<br>
            🔸 Latvijas valsts budžetā nav paredzēti līdzekļi ārzemēs mirušo Latvijas valstspiederīgo apbedīšanai vai to mirstīgo atlieku pārvešanai uz mītnes zemi, tādēļ jānoskaidro, vai ir noformēta dzīvības apdrošināšana.<br>
            🔸 Ir iespēja sazināties ar apbedīšanas biroju, kas nodarbojas ar repatriācijas procesu, kurš attālināti sazināsies ar vietējām tiesībsargājošajām un medicīnas iestādēm.<br>
            🔸 No valstīm, kuras atrodas ģeogrāfiski tālu no Latvijas, finansiālu apsvērumu dēļ bieži tiek praktizēta nevis mirušā cilvēka ķermeņa, bet gan kremētu mirstīgo atlieku pārvešana uz Latviju.<br>
            🔸 Ja mirusī persona, strādājot ārzemēs, ir veikusi sociālās iemaksas, tuvinieki ir tiesīgi vērsties pēc palīdzības konkrētās valsts sociālajā dienestā.<br>
            <br>
            </p>
        </div>
    </div>

    <nav class="guide-navigation" aria-label="Guide navigation">
        
        <div>
            <a href="{{ route('guide.index') }}" title="Gida sākumlapa">
            <span class="nav-title">Gida sākumlapa</span>
            </a>
        </div>
        <div>
            <a href="{{ route('guide.establishments') }}" title="Saziņa ar banku">
            <span class="nav-title">Nākamais</span>
            <span>&rarr;</span>
            </a>
        </div>
    </nav>
</section>
@endsection