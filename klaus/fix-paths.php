<?php
$html = file_get_contents('resources/views/welcome.blade.php');
$html = str_replace('src="img/', 'src="{{ asset(\'images/', $html);
$html = preg_replace('/(src="{{ asset\(\'images\/[^\"]+)"/', '$1\') }}"', $html);
file_put_contents('resources/views/welcome.blade.php', $html);

$html2 = file_get_contents('resources/views/components/header.blade.php');
$html2 = str_replace('src="img/', 'src="{{ asset(\'images/', $html2);
$html2 = preg_replace('/(src="{{ asset\(\'images\/[^\"]+)"/', '$1\') }}"', $html2);
file_put_contents('resources/views/components/header.blade.php', $html2);

$html3 = file_get_contents('resources/views/components/footer.blade.php');
$html3 = str_replace('src="img/', 'src="{{ asset(\'images/', $html3);
$html3 = preg_replace('/(src="{{ asset\(\'images\/[^\"]+)"/', '$1\') }}"', $html3);
file_put_contents('resources/views/components/footer.blade.php', $html3);

echo "Fixed paths.\n";
