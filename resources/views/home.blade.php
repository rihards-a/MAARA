@extends('layouts.app_layout_with_navbar')

@section('title', 'MAARA')

@section('og_title', 'Pēcdzīves plānošanas rīks MAARA')
@section('og_description', 'Pēcdzīves plānošanas rīks MAARA')
@section('og_image', asset('images/FB-index.jpg/'))

@section('main_content')
<section class="welcome-section">
    <p class="welcome-text">
    <h2>Atbildes uz jautājumiem par aiziešanu.</h2>
    Mums katram dzīves laikā nākas piedzīvot sēras, taču zaudējuma brīdim nav jābūt apjukuma pilnam.<br>
    <br>
    Mēs esam šeit, lai sniegtu Tev noderīgu informāciju par aiziešanas praktiskajiem aspektiem - gan, ja šobrīd esi atbildīgs par kāda cita izvadīšanu, gan, ja vēlies pārliecināties, ka Taviem tuviniekiem būs pieejama visa nepieciešamā informācija, lai spētu vieglāk tikt galā ar praktiskajiem aspektiem Tevis aiziešanas gadījumā.<br>
    </p>
  </section>

      <div class="cards-container">
        <div class="card vertical-card">
          <img src="{{ asset('images/guide.jpg') }}" alt="Ceļvedis tiem" class="card-image-guide">
            <div class="card-content-guide">
              <div>
                <h2 class="card-title">Kas jādara pēc tuvinieka nāves: soli pa solim</h2>
                <p class="card-text">Šis bezmaksas ceļvedis kalpo kā padomdevējs un asistents tiem, kas patlaban kārto praktiskus jautājumus, kas saistīti ar tuvinieka aiziešanu: sākot jau ar nāves iestāšanās brīdi.</p>
              </div>
              <button class="card-button" data-url="{{ route('guide.index') }}">Skatīt</button>
            </div>
        </div>
 

    <div class="card vertical-card">
        <img src="{{ asset('images/planosanas_riks.jpg') }}" alt="Ceļvedis ikkatram" class="card-image">
        <div class="card-content">
              <div>
                <h2 class="card-title">Pēcdzīves plānošanas rīks</h2>
                <p class="card-text">Esam izveidojuši Latvijā pirmo ''pēcdzīves'' plānošanas rīku. Tā mērķis ir atvieglot darbu ikvienam, kurš vēlās nodrošināt, ka aiziešanas vai rīcībnespējas gadījumā, aiz sevis tiek atstāta skaidrība un sirdsmiers.<br>
                <br>
                MAARA sistēma Tevi ērti un droši izvedīs caur virkni jautājumu, sniegs noderīgu informāciju un ļaus saglabāt un apkopot savas izvēles: sākot ar medicīniskiem lēmumiem un pilnvarām, informāciju par Taviem īpašumiem digitālajā vidē, un beidzot ar bēru preferencēm un mājdzīvnieka kopšanas norādījumiem.<br>
                </p>
              </div>
              
              <div>
                @if (auth()->user())
                  <button class="card-button-green" data-url="{{ route('dashboard') }}">Sākt plānot</button>
                @else
                  <button class="card-button-green" data-url="{{ route('why_register') }}">Sākt plānot</button>
                @endif
              </div>
        </div>
      </div>
    </div>

    <script>
      document.querySelectorAll(".card-button, .card-button-green").forEach(button => {
        button.addEventListener("click", function() {
          window.location.href = this.getAttribute("data-url");
        });
      });
    </script>
@endsection
