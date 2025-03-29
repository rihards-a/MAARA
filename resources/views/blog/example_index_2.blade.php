@extends('layouts.app_layout_with_navbar')

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
