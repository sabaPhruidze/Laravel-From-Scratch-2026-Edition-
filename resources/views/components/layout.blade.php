@props([
    'title' => 'laracasts',
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
<html lang="en" data-theme='night'>
{{-- data-theme შეიძლება იყოს coffee , drakula .. themes ომვძებნო ოფიციალურზე --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- ADDED CDN OF TAILWIND --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>{{ $title }}</title>
    <!--  making common title dynamic -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    @fonts

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            nav>a {
                color: green;

            }

            .max-w-400 {
                max-width: 400px;
                margin: auto;
            }

            .card {
                background: gray;
                padding: 1rem;
                text-align: center;
            }
        </style>
    @endif
</head>

<body>
    <x-nav />
    <main>
        {{ $slot }}
    </main>
    <!-- $slot არის ადგილი, სადაც შვილ კომპონენტიდან გადმოცემული HTML გამოჩნდება -->
</body>

</html>
