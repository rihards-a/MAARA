@extends('layouts.app_layout_with_navbar')

@section('title', 'Ziedot')

@section('main_content')
<section class="welcome-section">
    <h1 class="welcome-title">Par mums</h1>

    <div class="welcome-content">
        <div class="welcome-text">
            <p>
                MAARA komanda darbu uzsāka 2025. gada janvāra sākumā, vienojoties ap misiju atvieglot cilvēkiem vienu no nozīmīgākajiem dzīves aspektiem: aiziešanu no šīs pasaules. Tāpat kā piedzimšanu, arī aiziešanu pavada ne tikai spēcīgas emocijas, bet arī daudz unikālu un sarežģītu pārmaiņu, kuru vadībai nepieciešama gan pieejama informācija, gan sagatavošanās. Patlaban ir uzsākts darbs pie pirmās pēcdzīves plānošanas rīka versijas, kuru lietotāju rokās vēlamies nodot 2025. gada maija beigās.
            </p>
        </div>
    </div>
</section>
<section class="welcome-section">
    <div class="team-header">
        <div class="welcome-image">
            <img src="{{ asset('images/team.jpg') }}" alt="MAARA team photo">
        </div>
        <p>
            <b>Komanda no kreisās:</b><br>
            <br>
            Jānis Apels — Front-end programmatūra<br>
            <br>
            Janīna Gaļenko — Mārketinga stratēģija<br>
            <br>
            Elīza Lasmane — Stratēģiskā vadība<br>
            <br>
            Rihards Āboliņš — Back-end programmatūra un drošība<br>
            <br>
            Arta Urzula Goldmane — Produkta ētika un saturs<br>
        </p>
    </div>
</section>
<section class="welcome-section">
  <div class="team-header">
    <div class="welcome-text align-right">
        <p>
            <b>Kontakti:</b><br>
            <b>E-pasts:</b> info@maara.id.lv<br>
            <b>Whatsapp:</b> +371 29293576<br>
            <b>Facebook: </b><a href="https://www.facebook.com/maaraplano">Maara</a><br>
            <b>Adrese:</b> Startup House Riga<br>
        </p>
    </div>
</div>
</section>

@endsection
