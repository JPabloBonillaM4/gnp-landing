<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Seguros de Gastos Médicos Mayores GNP | Protege tu Salud y Economía</title>

        <!-- SEO Meta Tags -->
        <meta name="description" content="Protege tu salud y economía con Seguros de Gastos Médicos Mayores GNP. Acceso a la mejor red de hospitales, cero deducible por accidente y cobertura inmediata. ¡Cotiza ahora!">
        <meta name="keywords" content="seguro gastos médicos mayores, GNP seguros, protege tu salud, protege tu economía, seguro médico México, hospitales GNP, cero deducible accidente, cobertura médica, planes de salud, cotizar seguro médico">
        <meta name="author" content="Agente GNP">
        <meta name="robots" content="index, follow">

        <!-- Canonical URL -->
        <link rel="canonical" href="{{ config('app.url') }}">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:title" content="Seguros de Gastos Médicos Mayores GNP | Protege tu Salud y Economía">
        <meta property="og:description" content="Protege tu salud y economía con Seguros de Gastos Médicos Mayores GNP. Acceso a la mejor red de hospitales, cero deducible por accidente y cobertura inmediata.">
        <meta property="og:image" content="{{ config('app.url') }}/img/logo.png">
        <meta property="og:locale" content="es_MX">
        <meta property="og:site_name" content="Agente de Seguros GNP">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Seguros de Gastos Médicos Mayores GNP | Protege tu Salud y Economía">
        <meta name="twitter:description" content="Protege tu salud y economía con Seguros de Gastos Médicos Mayores GNP. Acceso a la mejor red de hospitales y cobertura inmediata.">
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

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MV33D65');</script>
        <!-- End Google Tag Manager -->
    </head>
    <body>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MV33D65"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

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
            {{-- SEO Content --}}
            <seo-content></seo-content>
            {{-- Footer --}}
            <footer-component></footer-component>
            {{-- Whatssapp --}}
            <whatsapp-contact></whatsapp-contact>
        </div>

        {{-- SEO: Fallback para bots que no ejecutan JavaScript --}}
        <noscript>
            <div style="max-width: 800px; margin: 2rem auto; padding: 1rem; font-family: sans-serif;">
                <h1>Protege tu Salud y tu Economía con GNP</h1>
                <p>Un Seguro de Gastos Médicos Mayores que se adapta a ti, con el respaldo de GNP y acceso a la red médica más sólida del país.</p>
                <h2>Planes de Seguros de Gastos Médicos Mayores</h2>
                <h3>Plan Básico desde $1,459/mes</h3>
                <p>Red limitada de hospitales, suma asegurada de $15,900,000, cero deducible por accidente.</p>
                <h3>Plan Esencial desde $1,736/mes</h3>
                <p>Red amplia de hospitales, suma asegurada de $37,100,000, cobertura en viajes.</p>
                <h3>Plan Amplio desde $2,703/mes</h3>
                <p>Red amplia de hospitales, emergencia en el extranjero, medicina de vanguardia.</p>
                <h2>Beneficios que realmente importan</h2>
                <ul>
                    <li>Acceso a la mejor red de hospitales</li>
                    <li>Asistencia dental con Dentalia</li>
                    <li>Libre elección de médicos</li>
                    <li>Médico a domicilio con costo preferente</li>
                    <li>Cero deducible por accidente</li>
                    <li>Consulta videollamada gratis</li>
                    <li>Asistencia Psicológica - 2 consultas gratis al mes</li>
                    <li>Alta tecnología</li>
                </ul>
                <p>Cotiza hoy y obtén cobertura inmediata para proteger tu salud y tu economía.</p>
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
