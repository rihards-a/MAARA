@extends('layouts.app_layout_with_navbar')

@section('title', 'Miršanas fakta reģistrācija')

@section('main_content')
<section class="welcome-section">
    <h1 class="welcome-title">Miršanas fakta reģistrācija</h1>

    <div class="welcome-content">
        <div class="welcome-text">
            <p>
            Skaidrojums par miršanas fakta reģistrēšanu – nepieciešamie dokumenti, atbildīgās iestādes un praktiski soļi.<br>
            <br>
            Miršanas izziņa <b>nav</b> tas pats, kas miršanas apliecība. Pēc miršanas izziņas iegūšanas nepieciešams iegūt aizgājēja <b>miršanas apliecību</b><br>
            <br>
            🔸Miršanas apliecība būs nepieciešama kārtojot apbedīšanu, mantojuma procesu, sociālos pabalstus un citas juridiskās formalitātes.<br>
            🔸Lai to iegūtu, ne vēlāk kā sešu dienu laikā ir nepieciešams doties uz jebkuru dzimtsarakstu nodaļu.<br>
            🔸Miršanas faktu reģistrē tajā dzimtsarakstu nodaļā, kurā vēršaties, neatkarīgi no mirušā dzīvesvietas.<br>
            🔸Pirms došanās uz dzimtsarakstu nodaļu, vēlams pārbaudīt attiecīgās iestādes darba laiku.<br>
            🔸<b>Līdzi jāņem - no ārstniecības personas iegūtā miršanas izziņa, mirušās personas pase vai ID-karte, savs (personas, kura reģistrē tuvinieka nāvi) personu apliecinošs dokuments.</b><br>
            🔸Miršanas apliecību izsniedz bez maksas, tajā pašā dienā pēc reģistrācijas fakta.<br>
            🔸Ja nāves gadījums ir noticis ārvalstīs, līdzi jāņem miršanas faktu apliecinošs dokuments ar tulkojumu latviešu valodā un apostille/legalizācija, ja nepieciešams.<br>
            <br>
                <div class="green-links">
                ℹ️ Noderīgi resursi: <br>
                <a href="https://latvija.gov.lv/Services/7804?utm" target="_blank" rel="noopener noreferrer">
                    Pakalpojuma saņemšanas process Rīgas valstspilsētā
                </a><br>
                <a href="https://likumi.lv/ta/id/253442" target="_blank" rel="noopener noreferrer">
                    Civilstāvokļu aktu reģistrācijas likums
                </a>
                </div>
            </p>
        </div>
    </div>

<nav class="guide-navigation" aria-label="Guide navigation">
    <div>
        <a href="{{ route('guide.afterloss') }}" title="Ko darīt uzreiz pēc tuvinieka nāves?">
            <span>&larr;</span>
            <span class="nav-title">Iepriekšējais</span>
        </a>
    </div>
    <div>
        <a href="{{ route('guide.available_support') }}" title="Pieejamais pabalsts">
            <span class="nav-title">Nākamais</span>
            <span>&rarr;</span>
        </a>
    </div>
</nav>
</section>
@endsection
