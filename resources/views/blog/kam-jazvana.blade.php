@extends('layouts.app_layout_with_navbar')

@section('title', 'Kam īsti jāzvana, kad tuvinieks ir aizgājis')

@section('og_title', 'Kam īsti jāzvana, kad tuvinieks ir aizgājis')
@section('og_description', 'Kad mēs ar komandu MAARA veicām intervijas ar dažādiem cilvēkiem, atklājās kāda patiesi būtiska kopsakarība — lielākā daļa cilvēku īsti nezina, kā rīkoties brīdī, kad tuvinieks ir aizgājis. Apjukums ir dabiska reakcija, un nereti pirmais jautājums, kas rodas ir - kam īsti zvanīt?')
@section('og_image', asset('images/' /*TODO pievienot pareizo bildi*/))

@section('main_content')
<section class="welcome-section">
    <h1 class="welcome-title">Kam īsti jāzvana, kad tuvinieks ir aizgājis</h1>

    <div class="welcome-content">
        <div class="welcome-text align-right">
            <p>
            <img src="{{ asset('images/blogs_4_jazvana.jpg') }}" alt="Zvanisanas_stadijas_header" style="width: 100%; height: auto; padding: 10px;">
            </p>
        </div>
    </div>
    <div class="welcome-content">
        <div class="welcome-text">
            <br>
            Kad mēs ar komandu MAARA veicām intervijas ar dažādiem cilvēkiem, atklājās kāda patiesi būtiska kopsakarība — lielākā daļa cilvēku īsti nezina, kā rīkoties brīdī, kad tuvinieks ir aizgājis. Apjukums ir dabiska reakcija, un nereti pirmais jautājums, kas rodas ir - kam īsti zvanīt?<br>
            <br>
            Pārsvarā mūsu pirmā reakcija ir zvanīt uz ātrās palīdzības numuru 113. Tomēr ir svarīgi zināt- ja esam pārliecināti, ka tuvinieks ir miris un nāve ir bijusi gaidāma, neatliekamās medicīniskās palīdzības (NMP) brigāde vairs nevarēs palīdzēt, un viņi nebūs tie, kuri pie mums atbrauks.<br>
            Arī policija nav jāiesaista, ja vien nav aizdomu par vardarbīgu nāvi vai neskaidriem nāves apstākļiem.<br>
            <br>

            <h2>Ko tad īsti darīt, ja tuvinieks ir miris mājās?</h2><br>
            Ja tuvinieks ir miris savās mājās un nāve bija gaidāma (piemēram, slimības vai vecuma dēļ), tad:<br>
            🔸 Jāsazinās ar tuvinieka ģimenes ārstu — tieši ģimenes ārsts ir tas, kurš konstatē nāves faktu un izsniedz attiecīgo izziņu.<br>
            <br>
            Ja nāve notikusi vēlā vakarā, brīvdienā vai svētku dienā un tuvinieka ģimenes ārsts nav pieejams:<br>
            🔸 Jāsazinās ar dežūrārstu tuvākajā poliklīnikā.<br>
            🔸 Tuvākajā darba dienā jāinformē tuvinieka ģimenes ārsts.<br>
            <br>
            
            <h2>Pēc tam:</h2><br>
            🔸 Jāsazinās ar apbedīšanas biroju, kas nodrošinās mirušā transportēšanu no mājām uz morgu vai citu izvēlētu vietu. Lielākā daļa apbedīšanas pakalpojumu ir pieejami 24/7.<br>
            <br>
            <h2>Ja tomēr rodas šaubas</h2><br>
            Ja neesi pārliecināts, kā īsti rīkoties, tu droši vari zvanīt uz:<br>
            🚑 113 (Neatliekamā medicīniskā palīdzība) vai 🚨112 (vienotais ārkārtas palīdzības tālrunis).<br>
            Palīdzības tālruņu darbinieki palīdzēs tev saprast, kā pareizi rīkoties konkrētajā situācijā.<br>
            <br>
            <h2>Atceries</h2><br>
            Tu neko nevari izdarīt "nepareizi" — taču zinot šo informāciju, tā var palīdzēt tev šajā smagajā un apjukuma pilnajā brīdī.<br>
            <br>
            </p>
        </div>
    </div>
</section>
@endsection