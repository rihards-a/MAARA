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
    const consentButton = document.getElementById('accept-cookies');
    if (localStorage.getItem('gtag_consent_given') === 'true') {
        give_consent();
    } else if (consentButton) {
      consentButton.addEventListener('click', function() {
        give_consent();
      });
    }
  });

  function give_consent() {
    gtag('consent', 'update', {
      'ad_storage': 'granted',
      'ad_user_data': 'granted',
      'ad_personalization': 'granted',
      'analytics_storage': 'granted',
    });
    gtag('config', '{{ $trackingId }}'); // configurable things here: https://developers.google.com/analytics/devguides/collection/ga4/reference/config
    localStorage.setItem('gtag_consent_given', 'true');
    document.getElementById('cookie-consent-banner')?.remove();
  }
</script>
