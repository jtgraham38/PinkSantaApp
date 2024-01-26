<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        @vite('resources/css/style.css')
        @vite('resources/css/fonts.css')
        
        <script src="https://kit.fontawesome.com/838b689285.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/alpinejs" defer></script>
        <script src="https://unpkg.com/htmx.org@1.9.10" integrity="sha384-D1Kt99CQMDuVetoL1lrYwg5t+9QdHe7NLX/SoJYkXDFfX37iInKRy5xLSi8nO7UC" crossorigin="anonymous"></script>


    </head>
    <body>
        
        @yield('template')

    </body>
</html>
