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
<script>
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