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
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 1.5rem; /* Adds spacing between elements */
    background: rgba(255, 255, 255, 0.95);
    padding: 1rem;
    border-radius: 10px;
    margin-bottom: 1rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .welcome-section img {
    width: 100%; /* Make the image span the full width */
    height: 500px; /* Maintain aspect ratio */
    border-radius: 10px; /* Optional: Add rounded corners */
    object-fit: cover; /* Ensures the image covers the area */
    }

    .welcome-section form {
    width: 100%; /* Make the form span the full width */
    }

    .welcome-section input[type="text"] {
    width: 100%; /* Make the input field span the full width */
    padding: 0.75rem; /* Add padding for better appearance */
    border: 1px solid #ccc; /* Add a border */
    border-radius: 8px; /* Rounded corners */
    font-size: 1rem; /* Adjust font size */
    }

    .welcome-section input[type="submit"] {
    width: 100%; /* Make the submit button span the full width */
    padding: 0.75rem; /* Add padding */
    background-color: var(--button-color); /* Use your button color */
    color: #ffffff; /* Text color */
    border: none; /* Remove border */
    border-radius: 8px; /* Rounded corners */
    font-size: 1rem; /* Adjust font size */
    cursor: pointer; /* Add pointer cursor */
    transition: all 0.3s ease; /* Smooth transition */
    }

    .welcome-section input[type="submit"]:hover {
    background-color: var(--button-hover); /* Hover effect */
    transform: translateY(-2px); /* Slight lift on hover */
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
  @if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
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
    <section class="welcome-section">
    <img src="{{ asset('images/a2c3fa3c-71f5-4ace-9df4-28e24c3c1203.webp') }}" alt="map">
        <form action="{{ route('guide.email_processing')}}" method="post">
            @csrf
            <h1 class="welcome-title">
            <label for="email1">Lūdzu, ievadi savu epastu, uz kuru nosūtīt gidu:</label>
            </h1>
            <input type="text" id="email" name="email" placeholder="Ievadi savu e-pastu">
            <input type="submit" value="Nosūtīt">
        </form>
    </section>
    </section>
  </main>

  <footer class="footer">
    <p>Seko mums <a href="https://www.instagram.com/" target="_blank">Instagram</a></p>
  </footer>
</body>
</html>