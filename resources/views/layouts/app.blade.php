<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{ Auth::user()->token }}">
    <title>{{ config('app.name', 'IETI-matricula') }}</title>
    <meta name="url" content="{{ $page ?? ''}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/template.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/92479866c9.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/moment.js') }}"></script>
    <script src="{{ asset('js/general.js') }}"></script>
</head>

<body class="">
    <div class="min-h-screen min-w-screen">
        @include('layouts.navigation')
        <div class="col-md-8">
            @yield('breadcrumbs')
        </div>
        <!-- Page Content -->
        <main>
            <div class="container-messages"></div>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
