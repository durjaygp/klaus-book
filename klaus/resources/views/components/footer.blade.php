@php $settings = \App\Models\HomepageSetting::getCached(); @endphp

<footer class="py-10 border-t border-white/10 bg-[#004d2e]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="flex flex-wrap justify-center gap-6 text-sm text-white/70 font-medium" style="font-family: 'Inter', sans-serif;">
            <a href="{{ url('privacy-policy') }}" class="hover:text-white transition">Privacy Policy</a>
            <a href="{{ url('terms-of-use') }}" class="hover:text-white transition">Terms of Use</a>
            <span>{{ $settings->footer_copyright_text ?? '© 2026 PVCMX · All rights reserved' }}</span>
        </div>
        <p class="mt-3 text-xs text-white/40 font-medium" style="font-family: 'Inter', sans-serif;">{{ $settings->footer_description ?? 'PVCMX Puerto Vallarta Consultants of Mexico · Your trusted partner for relocation, retirement, and doing business in Mexico.' }}</p>
        <div class="mt-4 flex justify-center gap-4 text-white/40 text-sm">
            @if($settings->social_facebook_url)
            <a href="{{ $settings->social_facebook_url }}" target="_blank" class="hover:text-white transition"><i class="fab fa-facebook-f"></i></a>
            @endif
            @if($settings->social_twitter_url)
            <a href="{{ $settings->social_twitter_url }}" target="_blank" class="hover:text-white transition"><i class="fab fa-twitter"></i></a>
            @endif
            @if($settings->social_instagram_url)
            <a href="{{ $settings->social_instagram_url }}" target="_blank" class="hover:text-white transition"><i class="fab fa-instagram"></i></a>
            @endif
            @if($settings->social_linkedin_url)
            <a href="{{ $settings->social_linkedin_url }}" target="_blank" class="hover:text-white transition"><i class="fab fa-linkedin-in"></i></a>
            @endif
        </div>
    </div>
</footer>

<!-- ════════════ SCROLL TO TOP ════════════ -->
<button id="scrollTop" aria-label="Scroll to top" onclick="window.scrollTo({top: 0, behavior: 'smooth'})">
    <i class="fas fa-arrow-up"></i>
</button>

<script>
    document.addEventListener('scroll', function() {
        const scrollTop = document.getElementById('scrollTop');
        if (window.scrollY > 500) {
            scrollTop.classList.add('visible');
        } else {
            scrollTop.classList.remove('visible');
        }
    });
</script>
