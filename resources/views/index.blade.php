<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'GNP') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css'])
        @endif
    </head>
    <body>
        <div id="app">
            {{-- Navbar --}}
            <navbar-component></navbar-component>
            {{-- Banner home --}}
            <banner-home></banner-home>
            {{-- Plans home --}}
            <plans-home></plans-home>
            {{-- Benefits home --}}
            <benefits-home></benefits-home>
            {{-- Opinions --}}
            <opinions-home></opinions-home>
            {{-- Certifications --}}
            <certifications-home></certifications-home>
            {{-- Footer --}}
            <footer-component></footer-component>
            {{-- Whatssapp --}}
            <whatsapp-contact></whatsapp-contact>
        </div>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/js/app.js'])
        @endif
    </body>
</html>
