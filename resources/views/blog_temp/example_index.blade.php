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
        <h1>@yield('header', __('blog_index.title'))</h1>
    </header>
    <main>
        <h2>{{ __('blog_index.coming_soon')}}</h2>
        <p>{{ __('blog_index.stay_tuned')}}</p>
    </main>
    <div>
        <a href="{{ route('lang.switch', ['lang'=>"lv"]) }}">lv</a>
        <a href="{{ route('lang.switch', ['lang'=>"en"]) }}">en</a>
    </div>
    <footer>
        <p>{{ __('blog_index.copyright')}}</p>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
