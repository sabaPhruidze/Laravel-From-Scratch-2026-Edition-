<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$title}}</title> // making common title dynamic

        @fonts

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                nav > a {
                    color:green;
                }
            </style>
        @endif
    </head>
    <body class="bg-white">
     <nav class='flex flex-row justify-between'>
            <a href="/">home</a>
            <a href="/about">About us</a>
            <a href="/contact">Contact us</a>
        </nav>
    <main>
        {{$slot}}
    </main>
    <!-- $slot არის ადგილი, სადაც შვილ კომპონენტიდან 
     გადმოცემული HTML გამოჩნდება -->
    </body>
</html>
