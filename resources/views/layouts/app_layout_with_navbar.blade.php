<!DOCTYPE html>
<html lang="lv">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', "MAARA")</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="{{ asset('css/about_page.css') }}" rel="stylesheet">
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
        <!-- <li><a href="/guide">Gids</a></li> -->
        <li><a href="/blog">Blogs</a></li>
        <!-- <li><a href="/contact">Kontakti</a></li> -->
        <li><a href="/about">Par mums</a></li>
        <!-- <li><a href="/donate">Ziedot</a></li>
        @guest -->
        <!-- <li><a href="/why_register">Reģistrēties</a></li>
        <li><a href="/login">Pieslēgties</a></li>
        @else
        <li><a href="{{ route('dashboard') }}">Mans profils</a></li>
        @endguest -->
      </ul>
    </div>
  </nav>

  <main class="main">
      @yield('main_content')
  </main>

  <footer class="footer">
    <p>Seko mums <a href="https://www.facebook.com/maaraplano" target="_blank">Facebook</a></p>
  </footer>
</body>
</html>