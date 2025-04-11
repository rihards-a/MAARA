@extends('layouts.app_layout_with_navbar')

@section('title', 'MAARA')

@section('main_content')<section class="welcome-section">
    <p class="welcome-text">
    <h2>Atbildes uz jautājumiem par aiziešanu.</h2><br>
    Mums katram dzīves laikā sanāk kaut reizi izdzīvot sēras, taču nāvi ne vienmēr ir jāpavada apjukumam. <br>
    <br>
    Mēs esam šeit, lai sniegtu Tev noderīgu informāciju par aiziešanas praktiskajiem aspektiem - gan, ja šobrīd esi atbildīgs par kāda cita izvadīšanu, gan, ja vēlies pārliecināties, ka Taviem tuviniekiem būs pieejama visa nepieciešamā informācija, lai spētu vieglāk tikt galā ar praktiskajiem aspektiem Tevis aiziešanas gadījumā.<br>
    </p>
  </section>

      <div class="cards-container">
        <div class="card vertical-card">
          <img src="{{ asset('images/guide.png') }}" alt="Ceļvedis tiem" class="card-image-guide">
            <div class="card-content-guide">
              <div>
                <h2 class="card-title">Kas jādara pēc tuvinieka nāves: soli pa solim</h2>
                <p class="card-text">Šis bezmaksas ceļvedis kalpo kā padomdevējs un asistents tiem, kas patlaban kārto praktiskus jautājumus, kas saistīti ar tuvinieka aiziešanu: sākot jau ar nāves iestāšanās brīdi.</p>
              </div>
              <button class="card-button" data-url="/guide">Skatīt</button>
            </div>
        </div>
 

    <div class="card vertical-card">
        <img src="{{ asset('images/planosanas_riks.png') }}" alt="Ceļvedis ikkatram" class="card-image">
        <div class="card-content">
          <div>
            <h2 class="card-title">Pēcdzīves plānošanas rīks</h2>
            <p class="card-text">Šovasar lietotāju rokās nodosim Latvijā pirmo ''pēcdzīves'' plānošanas rīku. Tā mērķis būs atvieglot darbu ikvienam, kurš vēlās nodrošināt, ka aiziešanas vai rīcībnespējas gadījumā, aiz sevis tiek atstāta skaidrība un sirdsmiers.<br>
            <br>
            MAARA sistēma Tevi ērti un droši izvedīs caur virkni jautājumu, sniegs noderīgu informāciju un ļaus saglabāt un apkopot savas izvēles: sākot ar medicīniskiem lēmumiem un pilnvarām, informāciju par Taviem īpašumiem digitālajā vidē, un beidzot ar bēru preferencēm un mājdzīvnieka kopšanas norādījumiem.<br>
            <br>
            <b>Mēs Tev paziņosim, kad plānošanas rīks būs gatavs!</b>
            </p>
          </div>
          <div>
            <div class="card-email">
            <input type="email" placeholder="Ievadi savu epastu">
            <button class="card-button-green" data-url={{route('dashboard')}}>Pieteikties</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  <script>
    document.querySelectorAll(".card-button").forEach(button => {
      button.addEventListener("click", function() {
        window.location.href = this.getAttribute("data-url");
      });
    });
  </script>

@endsection
