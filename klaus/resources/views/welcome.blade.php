<x-layouts.marketing :title="$settings->website_title ?? 'Klaus Book - Guide to Mexico'" :favicon="$settings->favicon ? asset($settings->favicon) : null">
<!-- ════════════ HERO ════════════ -->
    <section class="hero-bg relative min-h-screen flex items-center overflow-hidden pt-20" style="background: linear-gradient(to bottom, rgba(15, 23, 42, 0.4), rgba(15, 23, 42, 0.85)), url('{{ $settings->hero_bg_image ? asset($settings->hero_bg_image) : asset('bg.jpg') }}') center/cover no-repeat;">
        <!-- Glows -->
        <div class="hero-glow top-1/4 left-1/3 w-96 h-96 bg-red-500/20"></div>
        <div class="hero-glow bottom-1/3 right-1/4 w-72 h-72 bg-green-500/20"></div>
        <!-- Wave -->
        <div class="hero-wave"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-12">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left -->
                <div class="fade-up">
                    <div class="inline-flex items-center gap-2 bg-green-800/40 backdrop-blur-sm border border-white/20 rounded-full px-4 py-1.5 text-xs font-bold text-white/90 tracking-wider mb-6 section-label">
                        <i class="fas fa-crown text-xs text-yellow-400"></i> {{ $settings->hero_badge_text ?? "2026 PROFESSIONAL EDITION" }}
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight text-white hero-title">
                        The Ultimate Guide to <br />
                        <span class="text-[#CE1126]">Mexico</span>
                    </h1>
                    <p class="mt-5 text-xl text-white font-bold max-w-lg" style="font-family: 'Poppins', sans-serif;">
                        {{ $settings->hero_description ?? "Helping You Build Your Future in Mexico" }}
                    </p>
                    <ul class="mt-4 grid sm:grid-cols-2 gap-y-3 gap-x-6 text-sm text-white/90 font-medium" style="font-family: 'Inter', sans-serif;">
                        @if(!empty($settings->hero_bullets))
                            @foreach($settings->hero_bullets as $bullet)
                                <li class="flex items-center gap-2">{{ $bullet }}</li>
                            @endforeach
                        @else
                            <li class="flex items-center gap-2">🏡 Relocation &amp; Retirement</li>
                            <li class="flex items-center gap-2">🛂 Residency &amp; Immigration</li>
                            <li class="flex items-center gap-2">🏠 Real Estate &amp; Housing</li>
                            <li class="flex items-center gap-2">🏦 Banking &amp; Financial Integration</li>
                            <li class="flex items-center gap-2">🏥 Healthcare &amp; Insurance</li>
                            <li class="flex items-center gap-2">🏢 Business Formation &amp; Investment</li>
                            <li class="flex items-center gap-2 col-span-full sm:col-span-1">🤝 Trusted Professional Network</li>
                        @endif
                    </ul>
                    <div class="mt-8 flex flex-col sm:flex-row flex-wrap items-start sm:items-center gap-4">
                       <p class="text-white font-bold">We don’t charge for the 60 pages Handbook, but a small donation to our Buy Me A Coffee account will go a long way</p>        
                        <a href="{{ $settings->hero_coffee_url ?? "https://buymeacoffee.com/pvcmx" }}" target="_blank" class="btn-mexican text-white font-bold px-8 py-4 rounded-full text-lg shadow-2xl flex items-center gap-3 transition-all">
                            <i class="fas fa-mug-hot"></i> Buy Me a Coffee
                        </a>
                          <button x-data @click="$dispatch('open-consultation-modal')" class="btn-mexican text-white font-bold px-8 py-4 rounded-full text-lg shadow-2xl flex items-center gap-3 transition-all">
                             {{ $settings->hero_button_text ?? "Ultimate PVCMX Handbook" }}
                        </button>
                       
                    </div>
                </div>

                <!-- Right: Consultation Form -->
                <div class="flex justify-center lg:justify-end fade-up" style="transition-delay: 0.15s;">
                    <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-2xl w-full max-w-md border border-white/20 relative z-10 text-left">
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">Schedule Your Consultation</h3>
                        <p class="text-sm text-slate-600 mb-6" style="font-family: 'Inter', sans-serif;">Book a free discovery call to discuss your plans for Mexico.</p>
                        <livewire:hero-contact-form />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════ VIDEO ════════════ -->
    <section id="video" class="py-20 bg-[#F9FAFB] border-b border-slate-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center fade-up">
                <span class="text-[#006341] text-sm font-bold uppercase tracking-wider section-label"><i class="fas fa-video mr-2"></i>{{ $settings->video_section_label ?? "Welcome" }}</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mt-2">{{ $settings->video_section_title ?? "A Message from Klaus" }}</h2>
                <p class="mt-3 text-slate-600 max-w-2xl mx-auto text-lg" style="font-family: 'Inter', sans-serif;">{{ $settings->video_section_description ?? "Discover how we can help you navigate your journey to Mexico." }}</p>
            </div>
            
            <div class="mt-12 fade-up" style="transition-delay:0.1s;">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-900 aspect-video">
   
                    <iframe class="w-full h-full absolute inset-0" src="{{ $settings->video_embed_url ?? "https://www.youtube.com/embed/IS1ekHmWGhI" }}" title="Could You Live in Mexico?" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
           
                </div>
                
                <div class="mt-8 flex flex-wrap justify-center gap-4">
                    <a href="{{ $settings->social_facebook_url ?? "https://www.facebook.com/PVCMX/" }}" target="_blank" class="bg-[#1877F2] hover:opacity-90 text-white font-bold px-6 py-2.5 rounded-full text-sm shadow-lg flex items-center gap-2 transition-all hover:scale-105">
                        <i class="fab fa-facebook-f"></i> Follow Me On Facebook 
                    </a>
                    <a href="#" target="_blank" class="bg-gradient-to-tr from-[#f09433] via-[#dc2743] to-[#bc1888] hover:opacity-90 text-white font-bold px-6 py-2.5 rounded-full text-sm shadow-lg flex items-center gap-2 transition-all hover:scale-105">
                        <i class="fab fa-instagram"></i> Instagram
                    </a>
                    <!-- <a href="#" target="_blank" class="bg-[#1DA1F2] hover:opacity-90 text-white font-bold px-6 py-2.5 rounded-full text-sm shadow-lg flex items-center gap-2 transition-all hover:scale-105">
                        <i class="fab fa-twitter"></i> Twitter
                    </a> -->
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════ WHY THIS HANDBOOK ════════════ -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center fade-up">
                <span class="text-[#006341] text-sm font-bold uppercase tracking-wider section-label"><i class="fas fa-book-open mr-2"></i>{{ $settings->about_section_label ?? "WHY THIS HANDBOOK" }}</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mt-2">{{ $settings->about_section_title ?? "Practical Guidance from Real Experience" }}</h2>
                <p class="mt-3 text-slate-600 max-w-3xl mx-auto text-lg leading-relaxed" style="font-family: 'Inter', sans-serif;">{{ $settings->about_section_description ?? "A clear and honest introduction to relocating to Puerto Vallarta and other regions in Mexico. Created by someone who has experienced international relocation firsthand." }}</p>
            </div>
            <div class="mt-16 grid sm:grid-cols-3 gap-8">
                @if(!empty($settings->about_points))
                    @foreach($settings->about_points as $index => $point)
                    <div class="bg-[#F9FAFB] rounded-2xl p-8 border border-slate-200 hover:border-[#006341] transition-all card-hover fade-up" style="transition-delay:{{ 0.05 + ($index * 0.05) }}s;">
                        <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center text-[#006341] text-2xl mb-5">
                            <i class="fas {{ $point['icon'] ?? 'fa-star' }}"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900">{{ $point['title'] ?? '' }}</h3>
                        <p class="text-slate-600 mt-3 text-sm leading-relaxed" style="font-family: 'Inter', sans-serif;">{{ $point['desc'] ?? '' }}</p>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>


    <!-- ════════════ AUTHOR ════════════ -->
    <section id="author" class="py-20 bg-[#004d2e]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="order-2 md:order-1 fade-up">
                    <span class="text-[#CE1126] text-sm font-bold uppercase tracking-wider section-label"><i class="fas fa-user-tie mr-2"></i>{{ $settings->author_section_label ?? "About the Founder" }}</span>
                    <h2 class="text-3xl sm:text-4xl font-bold text-white mt-2">{{ $settings->author_section_title ?? "Klaus Sichelschmidt" }}</h2>
                                        @if($settings->author_section_desc_1)
                    <p class="mt-5 text-white/85 leading-relaxed text-base" style="font-family: 'Inter', sans-serif;">
                        {{ $settings->author_section_desc_1 }}
                    </p>
                    @endif
                    @if($settings->author_section_desc_2)
                    <p class="mt-4 text-white/85 leading-relaxed text-base" style="font-family: 'Inter', sans-serif;">
                        {{ $settings->author_section_desc_2 }}
                    </p>
                    @endif
                    @if($settings->author_section_desc_3)
                    <p class="mt-4 text-white/85 leading-relaxed text-base" style="font-family: 'Inter', sans-serif;">
                        {{ $settings->author_section_desc_3 }}
                    </p>
                    @endif
                   
                    
                </div>
                <div class="order-1 md:order-2 flex justify-center fade-up" style="transition-delay:0.15s;">
                    <div class="bg-green-900/30 backdrop-blur-sm rounded-2xl p-8 border border-white/20 w-full max-w-sm hover-lift text-center">
                        <div class="relative inline-block">
                            <div class="w-32 h-32 rounded-full shadow-xl shadow-green-500/30 mx-auto overflow-hidden border-4 border-[#006341]">
                                <img src="{{ $settings->about_profile_picture ? asset($settings->about_profile_picture) : asset('images/profile_picture.jpg') }}" alt="Klaus Sichelschmidt" class="w-full h-full object-cover">
                            </div>
                            <div class="absolute bottom-0 right-0 bg-white rounded-full p-1.5 shadow-md">
                                <i class="fas fa-check-circle text-[#006341] text-sm"></i>
                            </div>
                        </div>
                        <h4 class="text-2xl font-bold text-white mt-4">{{ $settings->author_section_title ?? "Klaus Sichelschmidt" }}</h4>
                        <p class="text-sm text-[#CE1126] font-medium" style="font-family: 'Inter', sans-serif;">Founder, PVCMX</p>
                        @if($settings->author_quote)
                        <div class="mt-6 text-sm text-white/80 border-t border-white/20 pt-6 italic leading-relaxed" style="font-family: 'Inter', sans-serif;">
                            <i class="fas fa-quote-left text-[#CE1126]/50 mr-2"></i>
                            “{{ $settings->author_quote }}”
                        </div>
                        @endif
                        <div class="mt-4 flex justify-center gap-4 text-xs text-white/60 font-medium" style="font-family: 'Inter', sans-serif;">
                            <span><i class="fas fa-map-pin text-[#CE1126]"></i> Puerto Vallarta, Mexico</span>
                            <span><i class="fas fa-calendar-check text-[#CE1126]"></i> First visited in 1999</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ════════════ REVIEW FORM ════════════ -->
    <section class="py-20 bg-slate-50 border-t border-slate-200 relative" id="reviewform">
        <div class="absolute inset-0 bg-green-500/5 blur-3xl pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <livewire:review-form />
        </div>
    </section>

    <!-- ════════════ TESTIMONIALS ════════════ -->
    @php
        $reviews = \App\Models\Review::where('status', 'approved')->latest()->get();
    @endphp
    @if($reviews->count() > 0)
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center fade-up">
                <h2 class="text-3xl font-bold text-slate-900">What Readers Say</h2>
                <p class="text-slate-600 mt-2" style="font-family: 'Inter', sans-serif;">Real stories from expats who used this guide.</p>
            </div>
            <div class="mt-12 grid sm:grid-cols-3 gap-6">
                @foreach($reviews as $index => $review)
                <div class="bg-slate-50 rounded-2xl p-6 border border-slate-200 hover:border-[#006341] transition-all card-hover fade-up" style="transition-delay:{{ 0.08 * ($index % 3) }}s;">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-green-600 to-red-600 flex items-center justify-center text-white font-bold text-sm" style="font-family: 'Poppins', sans-serif;">
                            {{ strtoupper(substr($review->name, 0, 2)) }}
                        </div>
                        <div>
                            <p class="font-semibold text-slate-900 testimonial-name">{{ $review->name }}</p>
                            <div class="flex text-[#CE1126] text-xs">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $review->rating ? '' : 'text-slate-300' }}"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 text-sm text-slate-700 italic leading-relaxed" style="font-family: 'Inter', sans-serif;">“{{ $review->content }}”</p>
                    @if($review->country)
                        <p class="mt-2 text-xs text-slate-500" style="font-family: 'Inter', sans-serif;">{{ $review->country }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @else
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-up">
            <h2 class="text-3xl font-bold text-slate-900">What Readers Say</h2>
            <p class="text-slate-600 mt-2" style="font-family: 'Inter', sans-serif;">Be the first to share your experience!</p>
        </div>
    </section>
    @endif

   

    <!-- ════════════ FOOTER ════════════ -->
    <footer class="py-10 border-t border-white/10 bg-[#004d2e]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="flex flex-wrap justify-center gap-6 text-sm text-white/70 font-medium" style="font-family: 'Inter', sans-serif;">
                <a href="privacy-policy.html" class="hover:text-white transition">Privacy Policy</a>
                <a href="terms-of-use.html" class="hover:text-white transition">Terms of Use</a>
                <span>© 2026 PVCMX · All rights reserved</span>
            </div>
            <p class="mt-3 text-xs text-white/40 font-medium" style="font-family: 'Inter', sans-serif;">PVCMX Puerto Vallarta Consultants of Mexico · Your trusted partner for relocation, retirement, and doing business in Mexico.</p>
            <div class="mt-4 flex justify-center gap-4 text-white/40 text-sm">
                <a href="https://www.facebook.com/PVCMX/" target="_blank" class="hover:text-white transition"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-white transition"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>

    <!-- ════════════ SCROLL TO TOP ════════════ -->
    <button id="scrollTop" aria-label="Scroll to top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- ════════════ JAVASCRIPT ════════════ -->
    
<livewire:consultation-modal />
</x-layouts.marketing>