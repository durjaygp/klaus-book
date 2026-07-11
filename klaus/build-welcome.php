<?php
$index = file_get_contents('d:/other/klaus-book/index-v4.html');

// We just want to extract the content inside `<x-layouts.marketing>`
// Wait, index-v4.html doesn't have `<x-layouts.marketing>`. It has `<body>` ... `</body>`
$start = strpos($index, '<!-- ════════════ HERO ════════════ -->');
$end = strpos($index, '<livewire:consultation-modal />');

if ($end === false) {
    // try to find where we should stop, like end of last section
    $end = strpos($index, '<!-- ════════════ SCROLL TO TOP ════════════ -->');
    if ($end === false) {
        $end = strpos($index, '</body>');
    }
}

// Let's grab from Hero to right before the footer. The footer was a separate component.
$end = strpos($index, '<!-- ════════════ DOWNLOAD ════════════ -->');

// Let's just fetch exactly what we need.
$hero_to_download = substr($index, $start, $end - $start);

// The rest of the page from download to the end.
$end_download = strpos($index, '<!-- ════════════ TESTIMONIALS ════════════ -->');
$testimonials_to_end = substr($index, $end_download, strpos($index, '<script>') - $end_download); // we don't need script since it's in layout or footer

// Let's stitch together a fresh `welcome.blade.php`
$welcome = "<x-layouts.marketing>\n";
$welcome .= $hero_to_download;
$welcome .= $testimonials_to_end;
$welcome .= "\n<livewire:consultation-modal />\n</x-layouts.marketing>";

// Now let's apply all the dynamic replacements carefully.
// 1. Hero Buttons
$welcome = preg_replace(
    '/<button onclick="openModal\(\)" class="btn-mexican text-white font-bold px-8 py-4 rounded-full text-lg shadow-2xl flex items-center gap-3 transition-all">\s*Ultimate PVCMX Handbook\s*<\/button>/s',
    '<button x-data @click="$dispatch(\'open-consultation-modal\')" class="btn-mexican text-white font-bold px-8 py-4 rounded-full text-lg shadow-2xl flex items-center gap-3 transition-all">
                             {{ $settings->hero_button_text ?? "Ultimate PVCMX Handbook" }}
                        </button>',
    $welcome
);

$welcome = preg_replace(
    '/<a href="https:\/\/buymeacoffee\.com\/pvcmx" target="_blank" class="btn-mexican text-white font-bold px-8 py-4 rounded-full text-lg shadow-2xl flex items-center gap-3 transition-all">/',
    '<a href="{{ $settings->hero_coffee_url ?? "https://buymeacoffee.com/pvcmx" }}" target="_blank" class="btn-mexican text-white font-bold px-8 py-4 rounded-full text-lg shadow-2xl flex items-center gap-3 transition-all">',
    $welcome
);

$welcome = str_replace(
    '<i class="fas fa-crown text-xs text-yellow-400"></i> 2026 PROFESSIONAL EDITION',
    '<i class="fas fa-crown text-xs text-yellow-400"></i> {{ $settings->hero_badge_text ?? "2026 PROFESSIONAL EDITION" }}',
    $welcome
);

$welcome = str_replace(
    'The Ultimate Guide to <br />
                        <span class="text-[#CE1126]">Mexico</span>',
    '{!! $settings->hero_title ?? "The Ultimate Guide to <br />" !!}
                        <span class="text-[#CE1126]">{{ $settings->hero_highlight ?? "Mexico" }}</span>',
    $welcome
);

$welcome = preg_replace(
    '/<p class="mt-5 text-xl text-white font-bold max-w-lg" style="font-family: \'Poppins\', sans-serif;">\s*Helping You Build Your Future in Mexico\s*<\/p>/',
    '<p class="mt-5 text-xl text-white font-bold max-w-lg" style="font-family: \'Poppins\', sans-serif;">
                        {{ $settings->hero_description ?? "Helping You Build Your Future in Mexico" }}
                    </p>',
    $welcome
);

// Hero bullets
$hero_bullets_html = <<<HTML
<ul class="mt-4 grid sm:grid-cols-2 gap-y-3 gap-x-6 text-sm text-white/90 font-medium" style="font-family: 'Inter', sans-serif;">
                        @if(!empty(\$settings->hero_bullets))
                            @foreach(\$settings->hero_bullets as \$bullet)
                                <li class="flex items-center gap-2">{{ \$bullet }}</li>
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
HTML;
$welcome = preg_replace('/<ul class="mt-4 grid sm:grid-cols-2 gap-y-3 gap-x-6 text-sm text-white\/90 font-medium" style="font-family: \'Inter\', sans-serif;">.*?<\/ul>/s', $hero_bullets_html, $welcome);

// Form
$welcome = preg_replace('/<form class="space-y-4 contact-form">.*?<\/form>/s', '<livewire:hero-contact-form />', $welcome);

// Video section
$welcome = preg_replace(
    '/<span class="text-\[#006341\] text-sm font-bold uppercase tracking-wider section-label"><i class="fas fa-video mr-2"><\/i>Welcome<\/span>/',
    '<span class="text-[#006341] text-sm font-bold uppercase tracking-wider section-label"><i class="fas fa-video mr-2"></i>{{ $settings->video_section_label ?? "Welcome" }}</span>',
    $welcome
);

$welcome = preg_replace(
    '/<h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mt-2">A Message from Klaus<\/h2>/',
    '<h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mt-2">{{ $settings->video_section_title ?? "A Message from Klaus" }}</h2>',
    $welcome
);

$welcome = preg_replace(
    '/<p class="mt-3 text-slate-600 max-w-2xl mx-auto text-lg" style="font-family: \'Inter\', sans-serif;">Discover how we can help you navigate your journey to Mexico\.<\/p>/',
    '<p class="mt-3 text-slate-600 max-w-2xl mx-auto text-lg" style="font-family: \'Inter\', sans-serif;">{{ $settings->video_section_description ?? "Discover how we can help you navigate your journey to Mexico." }}</p>',
    $welcome
);

$welcome = preg_replace(
    '/<iframe class="w-full h-full absolute inset-0" src="https:\/\/www\.youtube\.com\/embed\/IS1ekHmWGhI"/',
    '<iframe class="w-full h-full absolute inset-0" src="{{ $settings->video_embed_url ?? "https://www.youtube.com/embed/IS1ekHmWGhI" }}"',
    $welcome
);

// Socials in video section
$welcome = preg_replace(
    '/<a href="https:\/\/www\.facebook\.com\/PVCMX\/" target="_blank" class="bg-\[#1877F2\]/',
    '<a href="{{ $settings->social_facebook_url ?? "https://www.facebook.com/PVCMX/" }}" target="_blank" class="bg-[#1877F2]',
    $welcome
);

// About Section
$welcome = preg_replace(
    '/<span class="text-\[#006341\] text-sm font-bold uppercase tracking-wider section-label"><i class="fas fa-book-open mr-2"><\/i>WHY THIS HANDBOOK<\/span>/',
    '<span class="text-[#006341] text-sm font-bold uppercase tracking-wider section-label"><i class="fas fa-book-open mr-2"></i>{{ $settings->about_section_label ?? "WHY THIS HANDBOOK" }}</span>',
    $welcome
);

$welcome = preg_replace(
    '/<h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mt-2">Practical Guidance from Real Experience<\/h2>/',
    '<h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mt-2">{{ $settings->about_section_title ?? "Practical Guidance from Real Experience" }}</h2>',
    $welcome
);

$welcome = preg_replace(
    '/<p class="mt-3 text-slate-600 max-w-3xl mx-auto text-lg leading-relaxed" style="font-family: \'Inter\', sans-serif;">A clear and honest introduction to relocating to Puerto Vallarta and other regions in Mexico\. Created by someone who has experienced international relocation firsthand\.<\/p>/',
    '<p class="mt-3 text-slate-600 max-w-3xl mx-auto text-lg leading-relaxed" style="font-family: \'Inter\', sans-serif;">{{ $settings->about_section_description ?? "A clear and honest introduction to relocating to Puerto Vallarta and other regions in Mexico. Created by someone who has experienced international relocation firsthand." }}</p>',
    $welcome
);

// About Points - Replace the entire 3 div block with a loop
$about_points_html = <<<HTML
<div class="mt-16 grid sm:grid-cols-3 gap-8">
                @if(!empty(\$settings->about_points))
                    @foreach(\$settings->about_points as \$index => \$point)
                    <div class="bg-[#F9FAFB] rounded-2xl p-8 border border-slate-200 hover:border-[#006341] transition-all card-hover fade-up" style="transition-delay:{{ 0.05 + (\$index * 0.05) }}s;">
                        <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center text-[#006341] text-2xl mb-5">
                            <i class="fas {{ \$point['icon'] ?? 'fa-star' }}"></i>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900">{{ \$point['title'] ?? '' }}</h3>
                        <p class="text-slate-600 mt-3 text-sm leading-relaxed" style="font-family: 'Inter', sans-serif;">{{ \$point['desc'] ?? '' }}</p>
                    </div>
                    @endforeach
                @endif
            </div>
HTML;
$welcome = preg_replace('/<div class="mt-16 grid sm:grid-cols-3 gap-8">.*?<\/div>\s*<\/div>\s*<\/section>/s', $about_points_html . "\n        </div>\n    </section>", $welcome);

// Author section
$welcome = preg_replace(
    '/<span class="text-\[#CE1126\] text-sm font-bold uppercase tracking-wider section-label"><i class="fas fa-user-tie mr-2"><\/i>About the Founder<\/span>/',
    '<span class="text-[#CE1126] text-sm font-bold uppercase tracking-wider section-label"><i class="fas fa-user-tie mr-2"></i>{{ $settings->author_section_label ?? "About the Founder" }}</span>',
    $welcome
);

$welcome = preg_replace(
    '/<h2 class="text-3xl sm:text-4xl font-bold text-white mt-2">Klaus Sichelschmidt<\/h2>/',
    '<h2 class="text-3xl sm:text-4xl font-bold text-white mt-2">{{ $settings->author_section_title ?? "Klaus Sichelschmidt" }}</h2>',
    $welcome
);

$author_desc_html = <<<HTML
                    @if(\$settings->author_section_desc_1)
                    <p class="mt-5 text-white/85 leading-relaxed text-base" style="font-family: 'Inter', sans-serif;">
                        {{ \$settings->author_section_desc_1 }}
                    </p>
                    @endif
                    @if(\$settings->author_section_desc_2)
                    <p class="mt-4 text-white/85 leading-relaxed text-base" style="font-family: 'Inter', sans-serif;">
                        {{ \$settings->author_section_desc_2 }}
                    </p>
                    @endif
                    @if(\$settings->author_section_desc_3)
                    <p class="mt-4 text-white/85 leading-relaxed text-base" style="font-family: 'Inter', sans-serif;">
                        {{ \$settings->author_section_desc_3 }}
                    </p>
                    @endif
HTML;
$welcome = preg_replace('/<p class="mt-5 text-white\/85 leading-relaxed text-base".*?This handbook was created to share that experience in a clear and honest way—helping readers better understand life, retirement, relocation, and business opportunities in Puerto Vallarta and the surrounding region\.\s*<\/p>/s', $author_desc_html, $welcome);

$welcome = preg_replace(
    '/<h4 class="text-2xl font-bold text-white mt-4">Klaus Sichelschmidt<\/h4>/',
    '<h4 class="text-2xl font-bold text-white mt-4">{{ $settings->author_section_title ?? "Klaus Sichelschmidt" }}</h4>',
    $welcome
);

$welcome = preg_replace(
    '/<div class="mt-6 text-sm text-white\/80 border-t border-white\/20 pt-6 italic leading-relaxed" style="font-family: \'Inter\', sans-serif;">\s*<i class="fas fa-quote-left text-\[#CE1126\]\/50 mr-2"><\/i>.*?<\/div>/s',
    '@if($settings->author_quote)
                        <div class="mt-6 text-sm text-white/80 border-t border-white/20 pt-6 italic leading-relaxed" style="font-family: \'Inter\', sans-serif;">
                            <i class="fas fa-quote-left text-[#CE1126]/50 mr-2"></i>
                            “{{ $settings->author_quote }}”
                        </div>
                        @endif',
    $welcome
);

// Profile pic path fix
$welcome = str_replace('assets/profile_picture.jpg', "{{ asset('images/profile_picture.jpg') }}", $welcome);

// Replace header bg pic fix
$welcome = str_replace("url('assets/header.jpeg')", "url({{ asset('images/header.jpeg') }})", $welcome);


file_put_contents('resources/views/welcome.blade.php', $welcome);
echo "Rebuilt welcome.blade.php successfully!";
