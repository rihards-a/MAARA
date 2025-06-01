<script async src="https://www.googletagmanager.com/gtag/js?id={{ $trackingId }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}

  gtag('consent', 'default', {
    'ad_storage': 'denied',
    'ad_user_data': 'denied',
    'ad_personalization': 'denied', 
    'analytics_storage': 'denied',
    // the official documentation https://developers.google.com/tag-platform/gtagjs/reference doesn't mention these consent params:
      // 'functionality_storage': 'denied',
      // 'personalization_storage': 'denied',
      // 'security_storage': 'denied',
      // 'url_passthrough': true,
    'wait_for_update': 500
  });  
  gtag('js', new Date());
  
  document.addEventListener('DOMContentLoaded', function() {
    const consentKey = 'gtag_consent_given';
    const consentButton = document.getElementById('accept-cookies');
    const cookieBanner = document.getElementById('cookie-consent-banner');

    if (localStorage.getItem(consentKey) === 'true') {
        give_consent();
    } else if (consentButton) {
      consentButton.addEventListener('click', function() {
        setTimeout(() => { // slide in the banner
          cookieBanner?.classList.remove('translate-y-full');
        }, 500);
        consentButton.addEventListener('click', give_consent);
      });
    }

    function give_consent() {
      gtag('consent', 'update', {
        'ad_storage': 'granted',
        'ad_user_data': 'granted',
        'ad_personalization': 'granted',
        'analytics_storage': 'granted',
      });
      gtag('config', '{{ $trackingId }}'); // configurable things here: https://developers.google.com/analytics/devguides/collection/ga4/reference/config
      localStorage.setItem(consentKey, 'true');
      cookieBanner?.classList.add('translate-y-full'); // remove the banner with a sliding transition
      setTimeout(() => {
        cookieBanner?.remove();
      }, 500);
    }
  });
</script>
