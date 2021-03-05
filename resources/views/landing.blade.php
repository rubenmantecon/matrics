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
        body {
            background-color: aliceblue;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            height: 57vh;
        }

        .container-title {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .container-title>.title {
            font-size: 3em;
            margin: 0 15px;
        }

        .container-title>img {
            width: 11%;
        }

        main.landing>p.subtitle.text {
            font-size: 27px;
        }

        main.landing>p.text {
            font-size: 23px;
            text-align: center;
            margin: 7px 0;
        }

        main.landing>.btn-container {
            text-align: center;
            font-size: 25px;
            margin-top: 15px;
        }

    </style>
</head>

<body>
    <div class="container-title">
        <img src="{{ asset('images/logo-ieti.png') }}" alt="logo" class="logo" />
        <p class="title">Institut Esteve Terrades i Illa</p>
        <img src="{{ asset('images/logo-ieti.png') }}" alt="logo" class="logo" />
    </div>
    <main class="landing">
        <p class="subtitle text">Matriculació de l'alumnat de l'ESO, Batxillerat i Cicles Formatius de l'any
            {{ $year ?? '(year/year)' }}.
        </p>
        <p class="text">Per poder accedir al teu compte necessites haver rebut un correu electrònic amb un enllaç per
            poder registrar-te.</p>
        <p class="text">En el cas que ja tens un compte podràs accedir al teu expedient donanli el botó Accedir.
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
