<header x-data="{ open: false, scrolled: false }" 
        @scroll.window="scrolled = (window.pageYOffset > 50)" 
        @keydown.escape.window="open = false" 
        id="header" 
        :class="scrolled ? 'fixed shadow-xl' : 'absolute bg-transparent border-transparent'"
        :style="scrolled ? 'background-color: rgba(15, 23, 42, 0.95); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255,255,255,0.1);' : ''"
        class="top-0 left-0 w-full z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between py-4 transition-all duration-300" :class="scrolled ? 'py-2' : 'py-4'">
            <!-- Logo -->
            <div class="flex items-center gap-2 shrink-0">
                <a href="{{ url('/') }}" class="inline-block transition-transform hover:scale-105">
                    <img src="{{ asset('images/Logo.png') }}" alt="PVCMX Logo" 
                         :class="scrolled ? 'h-16 sm:h-16 md:h-20 lg:h-20' : 'h-16 sm:h-20 md:h-24 lg:h-28'"
                         class="w-auto object-contain transition-all duration-300">
                </a>
            </div>

            <!-- Desktop Nav -->
            <div class="hidden md:flex items-center gap-8">
                @php
                    $settings = \App\Models\HomepageSetting::first();
                @endphp
                @if(!empty($settings->menu))
                    @foreach($settings->menu as $menuItem)
                        <a href="{{ str_starts_with($menuItem['url'], '#') ? url('/') . $menuItem['url'] : $menuItem['url'] }}" class="text-sm font-medium text-white/85 hover:text-white transition nav-link">{{ $menuItem['label'] }}</a>
                    @endforeach
                @else
                    <a href="{{ url('/') }}#video" class="text-sm font-medium text-white/85 hover:text-white transition nav-link">Watch Video</a>
                    <a href="{{ url('/') }}#author" class="text-sm font-medium text-white/85 hover:text-white transition nav-link">About Klaus</a>
                    <a href="{{ url('/') }}#contact" class="text-sm font-medium text-white/85 hover:text-white transition nav-link">Contact Us</a>
                @endif
                <a href="{{ url('/') }}#bookconsultationform" class="btn-mexican text-white font-bold text-sm px-6 py-2.5 rounded-full shadow-lg transition-all hover:scale-105 cursor-pointer">
                    <i class="fas fa-calendar-check mr-2"></i>Book Consultation
                </a>
            </div>

            <!-- Mobile Toggle -->
            <button @click="open = !open" class="md:hidden text-white text-2xl focus:outline-none" aria-label="Menu">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Menu Overlay -->
        <div x-show="open" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="md:hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-[55]" 
             @click="open = false"></div>
        
        <!-- Mobile Menu Drawer -->
        <div x-show="open"
             x-transition:enter="transition ease-in-out duration-300 transform"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in-out duration-300 transform"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             class="md:hidden fixed top-0 right-0 h-screen w-72 bg-slate-900 shadow-2xl z-[60] flex flex-col">
            <div class="flex items-center justify-between p-6 border-b border-white/10">
                <span class="text-white font-bold text-lg tracking-wide" style="font-family: 'Poppins', sans-serif;">Menu</span>
                <button @click="open = false" class="text-white/80 hover:text-white text-2xl focus:outline-none transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="flex flex-col gap-6 text-base p-6 mt-2">
                @if(!empty($settings->menu))
                    @foreach($settings->menu as $menuItem)
                        <a @click="open = false" href="{{ str_starts_with($menuItem['url'], '#') ? url('/') . $menuItem['url'] : $menuItem['url'] }}" class="text-white/90 hover:text-white transition font-medium nav-link">{{ $menuItem['label'] }}</a>
                    @endforeach
                @else
                    <a @click="open = false" href="{{ url('/') }}#video" class="text-white/90 hover:text-white transition font-medium nav-link">Watch Video</a>
                    <a @click="open = false" href="{{ url('/') }}#author" class="text-white/90 hover:text-white transition font-medium nav-link">About Klaus</a>
                    <a @click="open = false" href="{{ url('/') }}#contact" class="text-white/90 hover:text-white transition font-medium nav-link">Contact Us</a>
                @endif
                <a @click="open = false" href="{{ url('/') }}#bookconsultationform" class="btn-mexican text-center text-white font-bold px-5 py-3.5 rounded-xl mt-4 shadow-lg cursor-pointer"><i class="fas fa-calendar-check mr-2"></i>Book Consultation</a>
            </div>
        </div>
    </div>
</header>
