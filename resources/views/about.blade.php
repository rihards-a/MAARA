<!DOCTYPE html>
<html lang="lv">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MAARA</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #29443D;
      --accent-color: #76A392;
      --text-color: #374151;
      --button-color:#D6A2B5;
      --button-hover: #631E38;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #f5f5f5;
      background-image: url("{{ asset('images/image2.png') }}");
      background-position: center;
      background-size: cover;
      background-attachment: fixed;
      font-family: 'Poppins', sans-serif;
      color: var(--text-color);
      min-height: 100vh;
    }

    nav {
      background-color: var(--primary-color);
      backdrop-filter: blur(10px);
      padding: 0.45rem 5%;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .nav-container {
      max-width: 1300px;
      margin: 0 auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbar-links {
      display: flex;
      gap: 1.5rem;
      list-style: none;
      align-items: center;
    }

    .navbar-links li a {
      text-decoration: none;
      color: #ffffff;
      font-weight: 500;
      font-size: 1rem;
      padding: 0.5rem 1rem;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .navbar-links li a:hover {
      background-color: var(--accent-color);
      transform: translateY(-2px);
    }

    .logo {
      color: #ffffff;
      font-size: 2rem;
      font-weight: 700;
      letter-spacing: 1px;
    }

    .main {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 1.5rem;
    }

    .welcome-section {
      background: rgba(255, 255, 255, 0.95);
      padding: 2.7rem;
      border-radius: 10px;
      margin-bottom: 1rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .welcome-title {
      font-size: 1.6rem;
      color: var(--primary-color);
      margin-bottom: 1.5rem;
      font-weight: 600;
    }

    .welcome-text {
      font-size: 0.95rem;
      line-height: 1.8;
      color: var(--text-color);
    }

    .cards-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      margin-top: 2rem;
    }

    .card {
      background: #ffffff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-15px);
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .card-content {
      padding: 2rem;
    }

    .card-title {
      font-size: 1.2rem;
      color: var(--primary-color);
      margin-bottom: 1rem;
      text-align: center;
    }

    .card-text {
      margin-bottom: 1.0rem;
      color: var(--text-color);
    }

    .card-button {
      background-color: var(--button-color);
      color: #ffffff;
      border: none;
      padding: 1rem 2rem;
      border-radius: 10px;
      font-weight: 600;
      cursor: pointer;
      width: 100%;
      transition: all 0.3s ease;
    }

    .card-button:hover {
      background-color: var(--button-hover);
      transform: translateY(-2px);
    }

    .footer {
      background-color: var(--primary-color);
      color: #ffffff;
      padding: 1rem;
      text-align: center;
      margin-top: 4rem;
      margin: 0 auto;
    }

    .footer a {
      color: var(--accent-color);
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s ease;
    }

    .footer a:hover {
      color: #ffffff;
    }

    .map {
    max-width: 100%; 
    width: 100%; 
    height: auto; 
    object-fit: contain; 
    object-position: center; 
    border-radius: 8px;
    }

    @media (max-width: 768px) {
      .nav-container {
        flex-direction: column;
        gap: 1rem;
      }

      .navbar-links {
        flex-direction: column;
        width: 100%;
      }

      .main {
        padding: 1rem;
      }

      .welcome-section {
        padding: 1.5rem;
      }

      .cards-container {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
  <nav>
    <div class="nav-container">
      <div class="logo">
         <a href="/">
           <img src="{{ asset('images/MAARA2.svg') }}" alt="logo">
         </a>
      </div>
      <ul class="navbar-links">
        <li><a href="/about">Par mums</a></li>
        <li><a href="/blog">Blogs</a></li>
        <li><a href="/contact">Kontakti</a></li>
      </ul>
    </div>
  </nav>

  <main class="main">
    <section class="welcome-section">
        <h1 class="welcome-title">Par mums</h1>
          <p class="welcome-text">
            Mēs esam komanda xyz.
          </p>
    </section>



   

  </main>

  <footer class="footer">
    <p>Seko mums <a href="https://www.instagram.com/" target="_blank">Instagram</a></p>
  </footer>
</body>
</html>