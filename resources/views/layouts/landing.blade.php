<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="{{ config('seo.desc') }}">
  <meta name="author" content="Leon Czerwiński">
  <meta name="robots" content="index, follow">
  <title>{{ config('seo.title') }}</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet">
  <link href="{{ asset('css/landing.css') }}" rel="stylesheet">
  <link rel="apple-touch-icon" type="image/png" href="{{ asset('icon.png') }}">
  <link rel="apple-touch-icon" type="image/png" sizes="72x72" href="{{ asset('icon72.png') }}">
  <link rel="apple-touch-icon" type="image/png" sizes="114x114" href="{{ asset('icon114.png') }}"
</head>

<body>
  @yield('content')
  <script src="{{ asset('js/landing.js') }}"></script>
</body>
</html>
