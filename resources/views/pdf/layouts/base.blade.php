<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <style>
        * {
            font-family: "DejaVu Sans", "Arial Unicode MS", Arial, sans-serif;
        }
        
        body {
            font-family: "DejaVu Sans", "Arial Unicode MS", Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
        }
        
        {{-- Ensure all text elements inherit the font --}}
        h1, h2, h3, h4, h5, h6, p, div, span, td, th, li {
            font-family: inherit;
        }

        
        {{-- For preventing single lines or words from spilling in to the next page --}}
        @page {
            margin: 50px 50px 100px 50px;
        }

        p, div, li, table, tr {
            page-break-inside: avoid;
            orphans: 3;
            widows: 3;
        }
    </style>
</head>
<body>
    <!-- @include('pdf.components.header') -->

    <div class="content">
        @yield('content')
    </div>

    <!-- @include('pdf.components.footer') -->
</body>
</html>