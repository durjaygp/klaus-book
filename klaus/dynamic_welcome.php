<?php
$html = file_get_contents('resources/views/welcome.blade.php');

$replacements = [
    '<i class="fas fa-crown text-xs text-yellow-400"></i> 2026 PROFESSIONAL EDITION' => '<i class="fas fa-crown text-xs text-yellow-400"></i> {{ $settings->hero_badge_text ?? "2026 PROFESSIONAL EDITION" }}',
    'The Ultimate Guide to <br />' => '{!! $settings->hero_title ?? "The Ultimate Guide to <br />" !!}',
    '<span class="text-[#CE1126]">Mexico</span>' => '<span class="text-[#CE1126]">{{ $settings->hero_highlight ?? "Mexico" }}</span>',
    'Helping You Build Your Future in Mexico' => '{{ $settings->hero_description ?? "Helping You Build Your Future in Mexico" }}',
    
    '<span class="text-[#006341] text-sm font-bold uppercase tracking-wider section-label"><i class="fas fa-video mr-2"></i>Welcome</span>' => '<span class="text-[#006341] text-sm font-bold uppercase tracking-wider section-label"><i class="fas fa-video mr-2"></i>{{ $settings->video_section_label ?? "Welcome" }}</span>',
    '<h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mt-2">A Message from Klaus</h2>' => '<h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mt-2">{{ $settings->video_section_title ?? "A Message from Klaus" }}</h2>',
    'Discover how we can help you navigate your journey to Mexico.' => '{{ $settings->video_section_description ?? "Discover how we can help you navigate your journey to Mexico." }}',
    'src="https://www.youtube.com/embed/IS1ekHmWGhI"' => 'src="{{ $settings->video_embed_url ?? "https://www.youtube.com/embed/IS1ekHmWGhI" }}"',
    
    'href="https://www.facebook.com/PVCMX/"' => 'href="{{ $settings->social_facebook_url ?? "https://www.facebook.com/PVCMX/" }}"',
    
    '<span class="text-[#006341] text-sm font-bold uppercase tracking-wider section-label"><i class="fas fa-book-open mr-2"></i>WHY THIS HANDBOOK</span>' => '<span class="text-[#006341] text-sm font-bold uppercase tracking-wider section-label"><i class="fas fa-book-open mr-2"></i>{{ $settings->about_section_label ?? "WHY THIS HANDBOOK" }}</span>',
    '<h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mt-2">Practical Guidance from Real Experience</h2>' => '<h2 class="text-3xl sm:text-4xl font-bold text-slate-900 mt-2">{{ $settings->about_section_title ?? "Practical Guidance from Real Experience" }}</h2>',
    'A clear and honest introduction to relocating to Puerto Vallarta and other regions in Mexico. Created by someone who has experienced international relocation firsthand.' => '{{ $settings->about_section_description ?? "A clear and honest introduction to relocating to Puerto Vallarta and other regions in Mexico. Created by someone who has experienced international relocation firsthand." }}',
];

$html = str_replace(array_keys($replacements), array_values($replacements), $html);

// Also replace the bullets with dynamic ones
$bullets_html = <<<'HTML'
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
HTML;

$html = preg_replace('/<ul.*?<\/ul>/s', $bullets_html, $html, 1);

file_put_contents('resources/views/welcome.blade.php', $html);
echo "Replaced welcome.blade.php\n";
