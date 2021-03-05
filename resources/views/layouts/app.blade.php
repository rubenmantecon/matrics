<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/template.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if(Auth::user()->role == 'admin')
            <div class="box" style="width: 100%">
                <header class="admin" style="margin: 0px !important">
                    <div class="items">
                        <a href="#user" class="item active"><i class="fas fa-home"></i> Home</a>
                        <a href="#login" class="item"><i class="fas fa-user-lock"></i> Login</a>
                        <a href="#test" class="item"><i class="fas fa-vial"></i> Test</a>
                    </div>
                    <p class="user"><i class="fas fa-user"></i> Admin</p>
                </header>
            </div>
            @endif
            @if(Auth::user()->role == 'alumne')
            <div class="box" style="width: 100%">
                <header style="margin: 0px !important">
                    <div class="items">
                        <a href="#user" class="item active"><i class="fas fa-home"></i> Home</a>
                        <a href="#login" class="item"><i class="fas fa-user-lock"></i> Login</a>
                        <a href="#test" class="item"><i class="fas fa-vial"></i> Test</a>
                    </div>
                    <p class="user"><i class="fas fa-user"></i> Student</p>
                </header>
            </div>
            @endif
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
