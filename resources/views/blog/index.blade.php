<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MAARA')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>@yield('header', 'Welcome to the MAARA Blog')</h1>
    </header>
    <main>
        <h2>Coming Soon</h2>
        <p>Stay tuned! Our blog posts will be available here in the near future.</p>
    </main>
    <footer>
        <p>&copy; 2025 MAARA. All rights reserved.</p>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 0;
    }
    header {
        background-color: #4CAF50;
        color: white;
        padding: 1rem;
        text-align: center;
    }
    main {
        padding: 2rem;
        text-align: center;
    }
    footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 1rem;
        position: fixed;
        width: 100%;
        bottom: 0;
    }
</style>
