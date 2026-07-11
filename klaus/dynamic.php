<?php
$welcome = file_get_contents('resources/views/welcome.blade.php');

$replacements = [
    // Hero Right side fix - The form was livewire previously, now it's static again. Let's fix that.
    '<form class="space-y-4 contact-form">' => '<livewire:hero-contact-form />',
    
    // Remove everything from inside the form to the end of the form tag. Wait, easier to just regex it out.
    // Let's do regex replacements for dynamic content.
];

// Re-inject livewire contact form
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

// Hero button
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

// Image
$welcome = preg_replace('/src="assets\/profile_picture\.jpg"/', 'src="{{ asset(\'images/profile_picture.jpg\') }}"', $welcome);

file_put_contents('resources/views/welcome.blade.php', $welcome);
echo 'Replaced dynamic vars';
