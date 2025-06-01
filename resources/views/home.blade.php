@extends('layouts.app_layout_with_navbar')

@section('title', 'MAARA')

@section('og_title', 'Pēcdzīves plānošanas rīks MAARA')
@section('og_description', 'Pēcdzīves plānošanas rīks MAARA')
@section('og_image', asset('images/FB-index.jpg/'))

@section('main_content')
{{-- Cookie Consent Popup --}}
<div id="cookie-consent-banner" class="fixed bottom-0 left-0 right-0 p-4 bg-white text-black shadow-[0_-10px_20px_-3px_rgba(0,0,0,0.2)] z-50 transform translate-y-full transition-transform duration-500 ease-out">
    <div class="max-w-4xl mx-auto flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0 md:space-x-8">
        <p class="text-sm text-center md:text-left">
            Mēs izmantojam sīkdatnes, lai uzlabotu lietošanas pieredzi un iegūtu informāciju par vietnes apmeklētību. Turpinot lietot mūsu vietni, jūs piekrītat sīkdatņu izmantošanai.
        </p>
        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4 w-full md:w-auto">
            <button id="accept-cookies" class="bg-gray-200 hover:bg-gray-300 text-black font-semibold py-2 px-6 rounded-md focus:outline-none whitespace-nowrap">
                Piekrītu 
            </button>
            <a href="/privacy-policy" class="text-black text-sm hover:underline py-2 px-2 text-center whitespace-nowrap">Privātuma politika</a>
        </div>
    </div>
</div>

<section class="welcome-section">
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
              <button class="card-button" data-url="{{ route('guide.index') }}">Skatīt</button>
            </div>
        </div>
 

    <div class="card vertical-card">
        <img src="{{ asset('images/planosanas_riks.jpg') }}" alt="Ceļvedis ikkatram" class="card-image">
        <div class="card-content">
              <div>
                <h2 class="card-title">Pēcdzīves plānošanas rīks</h2>
                <p class="card-text">Šovasar lietotāju rokās nodosim Latvijā pirmo ''pēcdzīves'' plānošanas rīku. Tā mērķis būs atvieglot darbu ikvienam, kurš vēlas nodrošināt, ka aiziešanas vai rīcībnespējas gadījumā, aiz sevis tiek atstāta skaidrība un sirdsmiers.<br>
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

    <div id="custom-alert" class="custom-alert">
      <div class="alert-content">
        <span class="close-button" onclick="hideCustomAlert()">&times;</span>
        <p id="alert-message">Paldies, Jūs esat pierakstījies jaunumu saņemšanai.</p>
        <button class="ok-button" onclick="hideCustomAlert()">Labi</button>
      </div>
    </div>
    
  <script>

    // Email subscription alert popup
    function showCustomAlert(message) {
      document.getElementById('alert-message').textContent = message;
      document.getElementById('custom-alert').style.display = 'flex';  // Change to flex
    }

    function hideCustomAlert() {
      document.getElementById('custom-alert').style.display = 'none';
    }

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
      showCustomAlert(data.message)    
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Kļūda nosūtot datus. Lūdzu, mēģiniet vēlreiz.');
    });
});
  // --- Cookie Consent JavaScript ---
    document.addEventListener('DOMContentLoaded', () => {
        const cookieBanner = document.getElementById('cookie-consent-banner');
        const acceptButton = document.getElementById('accept-cookies');
        const COOKIE_NAME = 'user_accepted_cookies';

        // Check if the user has already accepted cookies
        const hasAcceptedCookies = localStorage.getItem(COOKIE_NAME);

        if (!hasAcceptedCookies) {
            // If not accepted, show the banner after a short delay
            setTimeout(() => {
                cookieBanner.classList.remove('translate-y-full');
            }, 500); // Small delay to allow page to load visually
        }

        // Event listener for the "Accept All" button
        acceptButton.addEventListener('click', () => {
            localStorage.setItem(COOKIE_NAME, 'true'); // Store consent in local storage
            cookieBanner.classList.add('translate-y-full'); // Hide the banner
            setTimeout(() => {
                cookieBanner.style.display = 'none'; // Completely remove from layout after transition
            }, 500);
        });
    });
  </script>

@endsection
