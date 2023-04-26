<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> {{config('app.name')}} - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('assets/app.css') }}">
    </head>
    <body>

        {{--Barres de navigations--}}

        @include('navbar/navbar')

        {{--Tous nos contenus seront affichés ici--}}
        @yield('content')

        {{--Nos scripts javascript--}}

        @include('script')


        <script async src="https://cdn.jsdelivr.net/npm/es-module-shims@1/dist/es-module-shims.min.js" crossorigin="anonymous"></script>
        <script type="importmap">
        {
            "imports": { 
            "@popperjs/core": "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/esm/popper.min.js",
            "bootstrap": "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.esm.min.js"
         }
       }

        </script>
        <script type="module">
        import * as bootstrap from 'bootstrap'

        new bootstrap.Popover(document.getElementById('popoverButton'))
        </script>

     </body>
</html>
