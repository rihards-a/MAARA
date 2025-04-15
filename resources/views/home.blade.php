@extends('layouts.app_layout_with_navbar')

@section('title', 'MAARA')

@section('main_content')<section class="welcome-section">
    <p class="welcome-text">
    <h2>Atbildes uz jautājumiem par aiziešanu.</h2><br>
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
              <button class="card-button" data-url="/guide">Skatīt</button>
            </div>
        </div>
 

    <div class="card vertical-card">
        <img src="{{ asset('images/planosanas_riks.jpg') }}" alt="Ceļvedis ikkatram" class="card-image">
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
              <input type="email" id="email-input" placeholder="Ievadi savu epastu">
              <button class="card-button-green" id="email-button">Pieteikties</button>
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

    document.getElementById("email-button").addEventListener("click", function() {
    const email = document.getElementById("email-input").value;
    

    // Email validation function
    function isValidEmail(email) {
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailPattern.test(email);
    }
    if (!isValidEmail(email)) {
      alert("Lūdzu, ievadiet derīgu e-pasta adresi");
      return;
    }

    const formData = new FormData();
    formData.append('email', email);
    
    // Get CSRF token if you're using Laravel (remove if not needed)
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    
    // Make the POST request
    fetch('{{route("prerelease.email")}}', {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': csrfToken, // Include for Laravel CSRF protection
        'Accept': 'application/json'
      },
      body: formData
    })
    .then(response => {
      if (response.ok) {
        return response.json();
      }
      throw new Error('Network response was not ok');
    })
    .then(data => {
      // Handle successful response
      console.log('Success:', data);
      // Optional: redirect after successful submission
      alert(data.message)
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Kļūda nosūtot datus. Lūdzu, mēģiniet vēlreiz.');
    });
  });
  </script>

@endsection
