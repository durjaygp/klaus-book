<?php

$index = file_get_contents('d:/other/klaus-book/index-v4.html');
$welcome = file_get_contents('resources/views/welcome.blade.php');

$start_marker = '<!-- Right: Consultation Form -->';
$end_marker = '<!-- ════════════ DOWNLOAD ════════════ -->';

$start_pos = strpos($index, $start_marker);
$end_pos = strpos($index, $end_marker);

$missing_content = substr($index, $start_pos, $end_pos - $start_pos);

// Inject into welcome.blade.php before <!-- ════════════ DOWNLOAD ════════════ -->
$insert_pos = strpos($welcome, '<!-- ════════════ DOWNLOAD ════════════ -->');

$new_welcome = substr($welcome, 0, $insert_pos) . $missing_content . substr($welcome, $insert_pos);

file_put_contents('resources/views/welcome.blade.php', $new_welcome);
echo 'Restored missing content';
