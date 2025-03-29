@extends('layouts.app_layout_with_navbar')

@section('title', 'Ziedot')

@section('main_content')<section class="welcome-section">
    <p class="welcome-text">
    Gan komanda, kas veidojusi šo lapu, gan daudzi citi cilvēki Latvijā ir saskārušies ar apjukumu un neskaidrību par to, kas jādara, kad šo pasauli pamet tuvs cilvēks. Mūsu misija ir sniegt atbalstu šajā brīdī un nodrošināt, ka eksistē viens, uzticams avots, kas kalpo kā palīgs šajā brīdī, kad daudzi lēmumi jāpieņem pirmo reizi.<br>

Neatbildēto jautājumu šādos gadījumos ir vairāk, ja aizgājējs nav atstājis norādījumus un informāciju, kas palīdzētu tuviniekiem pieņemt dažādus lēmumus un veikt nepieciešamās darbības. Tāpēc mēs aicinām Tevi iepazīties arī ar mūsu ceļvedi atbildīgajiem: lēmumi un informācija, kas laikus ir jānorāda katram no mums, lai mūsu tuvinieki pieredzētu mazāk novēršanu pārdzīvojumu grūtajā brīdī.<br>

Visi materiāli šajā lapā ir pieejami bez maksas, bet mēs novērtēsim atsauksmes, ieteikumus un ziedojumus, lai varam veikt šo darbu vēl augstākā kvalitātē.
    </p>
  </section>

  <div class="cards-container">
    <div class="card">
      <img src="{{ asset('images/image3.jpg') }}" alt="Ceļvedis tiem">
      <div class="card-content">
        <h2 class="card-title">Kas jādara pēc tuvinieka nāves: soli pa solim</h2>
        <p class="card-text">Šis gids kalpos kā padomdevējs un asistents tiem, kas patlaban kārto praktiskus jautājumus, kas saistīti ar tuvinieka aiziešanu: sākot ar nāves iestāšanās brīdi, līdz pat gadam pēc nāves.</p>
        <button class="card-button" data-url="/guide">Izvēlēties</button>
      </div>
    </div>

    <div class="card">
      <img src="{{ asset('images/image2.jpg') }}" alt="Ceļvedis ikkatram">
      <div class="card-content">
        <h2 class="card-title">Ceļvedis atbildīgajiem: </h2>
        <p class="card-text">Šeit esam apkopojuši visus lēmumus, ko cilvēkam vajadzētu pieņemt saistībā ar savu "pēcnāvi" uz Zemes, lai atvieglotu šo smago brīdi tuviniekiem: sākot ar medicīniskām preferencēm un beidzot ar norādījumiem par izvadīšanu.</p>
        <button class="card-button" data-url={{route('dashboard')}}>Izvēlēties</button>
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
