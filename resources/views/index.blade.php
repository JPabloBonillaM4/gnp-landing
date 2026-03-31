<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Google tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-YH3H52DF06"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-YH3H52DF06');
        </script>

        <!-- Google tag (gtag.js) - Conversiones -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18054032274"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'AW-18054032274');
        </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Seguro Gastos Médicos Mayores GNP | Cotiza Ahora</title>

        <!-- SEO Meta Tags -->
        <meta name="description" content="Seguro de Gastos Médicos Mayores GNP. Protege tu salud y economía. ¡Cotiza ahora y obtén cobertura inmediata!">
        <meta name="keywords" content="seguro gastos médicos mayores, GNP seguros, protege tu salud, protege tu economía, seguro médico México, hospitales GNP, cero deducible accidente, cobertura médica, planes de salud, cotizar seguro médico">
        <meta name="author" content="Agente GNP">
        <meta name="robots" content="index, follow">

        <!-- Canonical URL -->
        <link rel="canonical" href="{{ config('app.url') }}">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:title" content="Seguro Gastos Médicos Mayores GNP | Cotiza Ahora">
        <meta property="og:description" content="Seguro de Gastos Médicos Mayores GNP. Protege tu salud y economía.">
        <meta property="og:image" content="{{ config('app.url') }}/img/logo.png">
        <meta property="og:locale" content="es_MX">
        <meta property="og:site_name" content="Agente de Seguros GNP">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Seguro Gastos Médicos Mayores GNP | Cotiza Ahora">
        <meta name="twitter:description" content="Seguro de Gastos Médicos Mayores GNP. Protege tu salud y economía.">
        <meta name="twitter:image" content="{{ config('app.url') }}/img/logo.png">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="/img/logo.png">
        <link rel="apple-touch-icon" href="/img/logo.png">

        <!-- Structured Data (JSON-LD) -->
        <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'InsuranceAgency',
            'name' => 'Seguros de Gastos Médicos Mayores GNP',
            'url' => config('app.url'),
            'logo' => config('app.url') . '/img/logo.png',
            'description' => 'Seguro de Gastos Médicos Mayores GNP. Protege tu salud y economía con Cobertura inmediata.',
            'areaServed' => [
                '@type' => 'Country',
                'name' => 'México',
            ],
            'serviceType' => 'Seguro de Gastos Médicos Mayores',
            'priceRange' => '$1,459 - $2,703 MXN/mes',
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

        {{-- SEO Content visible for crawlers --}}
        <div class="seo-static-content">
            <h1>Protege tu Salud y tu Economía</h1>
            <p>Un <strong>Seguro de Gastos Médicos Mayores GNP</strong> te brinda la tranquilidad de saber que tú y tu familia estarán protegidos ante cualquier eventualidad médica, sin comprometer tu patrimonio. Protege tu salud y protege tu economía con los mejores planes de seguros médicos en México.</p>

            <h2>Planes de Seguros de Gastos Médicos Mayores</h2>
            <p>Ofrecemos tres planes diseñados para proteger tu salud y tu economía según tus necesidades. Todos nuestros seguros de gastos médicos mayores incluyen acceso a la mejor red de hospitales, cero deducible por accidente, y cobertura inmediata desde el primer día.</p>

            <h3>Plan Básico - Desde $1,459 al mes</h3>
            <p>Nuestro Plan Básico de seguro de gastos médicos mayores ofrece protección esencial con suma asegurada de $15,900,000 pesos, acceso a red limitada de hospitales, deducible desde $15,500, coaseguro del 5% al 20%, y membresía Médica Móvil incluida. Ideal para proteger tu salud sin afectar tu economía.</p>

            <h3>Plan Esencial - Desde $1,736 al mes</h3>
            <p>El Plan Esencial amplía tu protección con suma asegurada de $37,100,000 pesos, acceso a red amplia de hospitales en todo México, cero deducible por accidente, cobertura en viajes, y consultas por videollamada. Protege tu salud y economía con mayor cobertura.</p>

            <h3>Plan Amplio - Desde $2,703 al mes</h3>
            <p>El Plan Amplio es nuestra cobertura más completa para proteger tu salud y economía. Incluye suma asegurada de $37,100,000 pesos, red amplia de hospitales, emergencias en el extranjero, medicina de vanguardia y alta tecnología médica. La mejor inversión para proteger tu salud.</p>

            <h2>Beneficios que Protegen tu Salud y Economía</h2>
            <p>Con GNP proteges tu salud con los mejores beneficios del mercado. Nuestro seguro de gastos médicos mayores incluye acceso a más de 3,000 hospitales, asistencia dental con Dentalia, médico a domicilio con costo preferente, consultas por videollamada gratis, asistencia psicológica (2 consultas gratis al mes), libre elección de médicos, y cero deducible por accidente. Protege tu economía evitando gastos médicos imprevistos.</p>

            <h2>¿Por Qué Elegir Gastos Médicos Mayores GNP?</h2>
            <p>GNP es la aseguradora #1 en pago de siniestros en México, con más de 115 años protegiendo la salud y economía de las familias mexicanas. Nuestros seguros de gastos médicos mayores te permiten proteger tu salud con la mejor red médica del país y proteger tu economía con planes accesibles. Cotiza hoy y obtén cobertura inmediata.</p>

            <p>Un imprevisto médico no debería poner en riesgo tu patrimonio. Con un seguro de gastos médicos mayores de GNP, proteges tu salud ante hospitalización, cirugías, emergencias y tratamientos especializados, y proteges tu economía familiar evitando deudas por gastos médicos. La inversión mensual en tu seguro es mínima comparada con el respaldo financiero y médico que recibes.</p>

            <p>Elige entre nuestros tres planes de seguros de gastos médicos mayores: Plan Básico (ideal para protección esencial), Plan Esencial (cobertura amplia a buen precio), o Plan Amplio (máxima protección internacional). Todos diseñados para proteger tu salud y economía. Cotiza ahora y comienza a proteger tu salud hoy mismo.</p>
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

        <style>
            /* Hide SEO static content - visible for crawlers but hidden for users */
            .seo-static-content {
                position: absolute;
                left: -9999px;
                width: 1px;
                height: 1px;
                overflow: hidden;
            }
        </style>

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
