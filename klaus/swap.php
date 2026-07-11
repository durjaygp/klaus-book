<?php
$html = file_get_contents('resources/views/welcome.blade.php');

$startStr = '<form class="space-y-4 contact-form">';
$endStr = '</form>';

$startPos = strpos($html, $startStr);
if ($startPos !== false) {
    $endPos = strpos($html, $endStr, $startPos);
    if ($endPos !== false) {
        $endPos += strlen($endStr);
        $before = substr($html, 0, $startPos);
        $after = substr($html, $endPos);
        $newHtml = $before . '<livewire:hero-contact-form />' . $after;
        file_put_contents('resources/views/welcome.blade.php', $newHtml);
        echo "Replaced successfully.";
    }
}
