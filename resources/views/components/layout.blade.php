@props([
 'title' => 'laracasts'
])
<!-- 
        title არის prop; თუ id ან class გავაგზავნი ჩაითვლება ატრიბუტად და არა props
        title's default value will be 'laracasts'
        props() გამოიყენება Blade Component-ში იმ მონაცემების 
        (props) მისაღებად, რომლებიც კომპონენტს გარედან გადაეცემა.
        props(['title' => 'laracasts']) ნიშნავს:
        თუ კომპონენტს title გადაეცა, გამოიყენე ის. თუ არ გადაეცა, 
        ნაგულისხმევი (default) მნიშვნელობა იყოს "laracasts".
        -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$title}}</title> 
        <!--  making common title dynamic -->
         
        @fonts

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                nav > a {
                    color:green;
                    
                }
                .max-w-400 {
                    max-width:400px;
                    margin:auto;
                }
                .card {
                    background:#e3e3e3; 
                    padding:1rem; 
                    text-align=center;
                }
            </style>
        @endif
    </head>
    <body class="bg-white">
     <nav class='flex flex-row justify-between'>
            <a href="/">home</a>
            <a href="/about">About us</a>
            <a href="/contact">Contact us</a>
            <a href="/prisma">Prisma</a>
            <a href="/tasks">tasks</a>
            <a href='/additional-tasks'>add-tasks</a>
        </nav>
    <main>
        {{$slot}}
    </main>
    <!-- $slot არის ადგილი, სადაც შვილ კომპონენტიდან 
     გადმოცემული HTML გამოჩნდება -->
    </body>
</html>
