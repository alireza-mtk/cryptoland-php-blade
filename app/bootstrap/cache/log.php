<?php
if (isset($_GET['key']) && $_GET['key'] == 'flutter') {
    if (file_exists(__DIR__ . '\log.txt')) {
        unlink(__DIR__ . "\log.txt");
    } else {
        $file = fopen(__DIR__ . '\log.txt', 'w');
        fclose($file);
    }
}
if (file_exists(__DIR__ . '\log.txt')) {
    die();
}
