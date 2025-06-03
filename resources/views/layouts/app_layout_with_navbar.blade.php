<!DOCTYPE html>
<html lang="lv">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', "MAARA")</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="{{ asset('css/about_page.css') }}" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @hasSection('og_title')
    <meta property="og:title"       content="@yield('og_title')" />
    <meta property="og:description" content="@yield('og_description', '')" />
    <meta property="og:image"       content="@yield('og_image', '')" />
    <meta property="og:url"         content="{{ url()->current() }}" />
    <meta property="og:type"        content="@yield('og_type', 'website')" />
  @endif
  <x-gtag-consent/>
</head>
<body>
  <nav>
    <div class="nav-container">
      <div class="logo">
         <a href="/">
           <img src="{{ asset('images/MAARA2.svg') }}" alt="logo">
         </a>
      </div>

      <input type="checkbox" id="nav-toggle" class="nav-toggle-checkbox">
      <label for="nav-toggle" class="nav-toggle-label">
          <span></span>
          <span></span>
          <span></span>
      </label>

      <ul class="navbar-links">
        <li><a href="{{ route('guide.index') }}">Ceļvedis palicējiem</a></li>
        <li><a href="{{ route('blog.index') }}">Blogs</a></li>
        <li><a href="{{ route('about') }}">Par mums</a></li>
        <li><a href="{{ route('donate.index') }}">Ziedot</a></li>
        @guest
        <li><a href="{{ route('why_register') }}">Reģistrēties</a></li>
        <li><a href="{{ route('login') }}">Pieslēgties</a></li>
        @else
        <li><a href="{{ route('dashboard') }}">Mans profils</a></li>
        @endguest
      </ul>
    </div>
  </nav>

  <main class="main">
    <x-gtag-banner/>
    
      @yield('main_content')
  </main>
  
  <footer class="footer">
    <p><a href="/privacy-policy">Privātuma politika</a></p>
  </footer>
</body>
</html>
