<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pàgina Principal</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/template.css') }}">
    <style>

    </style>
</head>

<body class="landing">
    <div class="container-title">
        <img src="{{ asset('images/logo-ieti.png') }}" alt="logo" class="logo" />
        <p class="title">Institut Esteve Terrades i Illa</p>
        <img src="{{ asset('images/logo-ieti.png') }}" alt="logo" class="logo" />
    </div>
    <main>
        <p class="subtitle text">Matriculació de l'alumnat de l'ESO, Batxillerat i Cicles Formatius de l'any
            {{ $year ?? '(year/year)' }}.
        </p>
        <p class="text">Per poder accedir al teu compte necessites haver rebut un correu electrònic amb un enllaç per
            poder registrar-te.</p>
        <p class="text">En cas de disposar ja d'un compte, pots accedir al teu expedient donant-li al botó Accedir.
        </p>
        <div class="btn-container">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn secundary-btn">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn primary-btn">Accedir</a>
                @endauth
            @endif
        </div>
    </main>
</body>

</html>
