<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#8a2be2">
    <meta name="msapplication-navbutton-color" content="#8a2be2">
    <meta name="apple-mobile-web-app-status-bar-style" content="#8a2be2">

    @include('web.shared.seo')

    <link rel="stylesheet" media="screen" href="{{ mix('/assets/css/app.css') }}">

    @if (!$settings['mainEnableFollow'])
        <meta name="robots" content="noindex, nofollow" />
    @endif
</head>
<body>
    @include('web.shared.header')

    @yield('body')

    @include('web.shared.footer')

    <script src="{{ mix('/assets/js/manifest.js') }}"></script>
    <script src="{{ mix('/assets/js/vendor.js') }}"></script>
    <script src="{{ mix('/assets/js/app.js') }}"></script>
</body>
</html>
