<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', 'Kadi to kalkulator dla cukrzyków. Wybierz, co jesz, a Kadi obliczy dla Ciebie ilość wymienników węglowodanowych, kcal oraz proponowane dawki insuliny na podstawie indywidualnego przelicznika J/WW')">
    <meta name="author" content="Leon Czerwiński">
    <meta name="robots" content="index, follow">
    <link rel="apple-touch-icon" type="image/png" href="{{ asset('icon.png') }}">
    <link rel="apple-touch-icon" type="image/png" sizes="72x72" href="{{ asset('icon72.png') }}">
    <link rel="apple-touch-icon" type="image/png" sizes="114x114" href="{{ asset('icon114.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script> window.Laravel = { csrfToken : '{{ csrf_token() }}'}; </script>
    @yield('head-script')
</head>
<body>
    @include('inc.nav')
    <div class='container' style='padding-top:15px;'>
        @if(session('info'))
           @include('inc.info')
        @endif
        @yield('content')
    </div>
    @include('inc.fb')
    @yield('body-bottom-script')
</body>