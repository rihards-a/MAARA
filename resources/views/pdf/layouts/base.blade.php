<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
</head>
<body>
    @include('pdf.components.header')

    <div class="content">
        @yield('content')
    </div>

    @include('pdf.components.footer')
</body>
</html>