<?php
$html = file_get_contents('../index-v4.html');
preg_match('/(<!-- ════════════ HERO ════════════ -->.*?)<!-- ════════════ FOOTER ════════════ -->/s', $html, $matches);
if(isset($matches[1])) {
    $content = $matches[1];
    
    // Replace old modal HTML with Livewire component
    // First, remove the old Handbook modal and contact form modal JS calls
    $content = preg_replace('/<div id="handbookModal".*?<\/div>.*?<\/div>.*?<\/div>/s', '', $content);
    
    // Replace openModal() calls with $dispatch
    $content = str_replace('onclick="openModal()"', 'x-data @click="$dispatch(\'open-consultation-modal\')"', $content);

    // Swap out contact form to Livewire or just keep it for now. Actually, the form was in hero and modal. 
    // In Hero: `<form class="space-y-4 contact-form">`
    // Wait, let's just dump it into a blade template first and use string replace.
    
    $finalContent = "<x-layouts.marketing>\n" . $content . "\n<livewire:consultation-modal />\n</x-layouts.marketing>\n";
    file_put_contents('resources/views/welcome.blade.php', $finalContent);
    echo "Extracted.\n";
} else {
    echo "Failed.\n";
}
