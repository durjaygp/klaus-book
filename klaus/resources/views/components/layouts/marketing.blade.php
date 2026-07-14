<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Move to Mexico | 2026 Relocation & Retirement Guide | PVCMX' }}</title>
    
    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ $title ?? 'Move to Mexico | 2026 Relocation & Retirement Guide | PVCMX' }}" />
    <meta name="description" content="Planning to move or retire in Mexico? Get expert guidance on Puerto Vallarta real estate, visas, healthcare, banking, and daily expat life with PVCMX's 2026 handbook." />
    <meta name="keywords" content="move to Mexico, retire in Mexico, Puerto Vallarta relocation, Mexico expat guide, Mexico residency visas 2026, Mexico real estate, cost of living in Mexico, healthcare in Mexico for expats, start a business in Mexico, PVCMX, Klaus Sichelschmidt" />
    <meta name="author" content="Klaus Sichelschmidt, PVCMX" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:title" content="{{ $title ?? 'Move to Mexico | 2026 Relocation & Retirement Guide | PVCMX' }}" />
    <meta property="og:description" content="Planning to move or retire in Mexico? Get expert guidance on Puerto Vallarta real estate, visas, healthcare, banking, and daily expat life with PVCMX's 2026 handbook." />
    <meta property="og:image" content="{{ asset('images/dark.png') }}" />
    <meta property="og:site_name" content="PVCMX" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ url('/') }}" />
    <meta property="twitter:title" content="{{ $title ?? 'Move to Mexico | 2026 Relocation & Retirement Guide | PVCMX' }}" />
    <meta property="twitter:description" content="Planning to move or retire in Mexico? Get expert guidance on Puerto Vallarta real estate, visas, healthcare, banking, and daily expat life with PVCMX's 2026 handbook." />
    <meta property="twitter:image" content="{{ asset('images/Logo.png') }}" />
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="shortcut icon" href="{{ $favicon ?? asset('images/Logo.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&family=Poppins:wght@600;700;800;900&display=swap" rel="stylesheet" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased text-[#0F172A] bg-[#F9FAFB] font-inter">
    <x-header />

    {{ $slot }}

    {{-- <x-footer /> --}}
    
    @livewireScripts
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // ── Intersection Observer for animations ──
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });
            document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));

            // ── Smooth anchor scroll ──
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    const targetEl = document.querySelector(targetId);
                    if (targetEl) {
                        e.preventDefault();
                        targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });
        });
    </script>
</body>
</html>
