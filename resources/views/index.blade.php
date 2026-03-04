<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Agente de Seguros GNP | Protección para Ti y tu Familia</title>

        <!-- SEO Meta Tags -->
        <meta name="description" content="Soy tu Agente de Seguros GNP. Te asesoro para encontrar el plan de seguro ideal para ti y tu familia. Cotiza seguros de vida, auto, gastos médicos y más.">
        <meta name="keywords" content="agente GNP, seguros GNP, seguro de vida, seguro de auto, gastos médicos mayores, cotizar seguro, agente de seguros, GNP seguros">
        <meta name="author" content="Agente GNP">
        <meta name="robots" content="index, follow">

        <!-- Canonical URL -->
        <link rel="canonical" href="{{ config('app.url') }}">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:title" content="Agente de Seguros GNP | Protección para Ti y tu Familia">
        <meta property="og:description" content="Soy tu Agente de Seguros GNP. Te asesoro para encontrar el plan de seguro ideal para ti y tu familia. Cotiza seguros de vida, auto, gastos médicos y más.">
        <meta property="og:image" content="{{ config('app.url') }}/img/logo.png">
        <meta property="og:locale" content="es_MX">
        <meta property="og:site_name" content="Agente de Seguros GNP">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Agente de Seguros GNP | Protección para Ti y tu Familia">
        <meta name="twitter:description" content="Soy tu Agente de Seguros GNP. Te asesoro para encontrar el plan de seguro ideal para ti y tu familia.">
        <meta name="twitter:image" content="{{ config('app.url') }}/img/logo.png">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="/img/logo.png">
        <link rel="apple-touch-icon" href="/img/logo.png">

        <!-- Structured Data (JSON-LD) -->
        <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'InsuranceAgency',
            'name' => 'Agente de Seguros GNP',
            'url' => config('app.url'),
            'logo' => config('app.url') . '/img/logo.png',
            'description' => 'Agente de Seguros GNP. Te asesoro para encontrar el plan de seguro ideal para ti y tu familia.',
            'areaServed' => [
                '@type' => 'Country',
                'name' => 'México',
            ],
            'serviceType' => ['Seguros de Vida', 'Seguros de Auto', 'Gastos Médicos Mayores', 'Seguros de Hogar'],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
        </script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css'])
        @endif
    </head>
    <body>
        {{-- Loader --}}
        <div id="page-loader">
            <div class="loader-content">
                <img src="/img/logo.png" alt="GNP Logo" class="loader-logo" />
                <div class="loader-spinner"></div>
            </div>
        </div>

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

        {{-- SEO: Fallback para bots que no ejecutan JavaScript --}}
        <noscript>
            <div style="max-width: 800px; margin: 2rem auto; padding: 1rem; font-family: sans-serif;">
                <h1>Agente de Seguros GNP</h1>
                <p>Soy tu Agente de Seguros GNP. Te asesoro para encontrar el plan de seguro ideal para ti y tu familia.</p>
                <h2>Nuestros Planes de Seguros</h2>
                <ul>
                    <li>Seguros de Vida</li>
                    <li>Seguros de Auto</li>
                    <li>Gastos Médicos Mayores</li>
                    <li>Seguros de Hogar</li>
                </ul>
                <p>Contáctanos para una cotización personalizada.</p>
            </div>
        </noscript>
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/js/app.js'])
        @endif

        <script>
            window.addEventListener('load', function () {
                const loader = document.getElementById('page-loader');
                loader.classList.add('fade-out');
                loader.addEventListener('transitionend', function () {
                    loader.style.display = 'none';
                });
            });
        </script>
    </body>
</html>
