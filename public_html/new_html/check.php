<?php
if (isset($_GET['test']) || isset($_COOKIE['test'])) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$revid = $_GET['revid'] ?? '';

if (empty($revid)) {
    echo 'false';
    exit;
}

require_once __DIR__ . "/require.php";

$dir_path = REVISIONS_PATH . "/$revid";

if (!is_dir($dir_path)) {
    echo 'false';
    exit;
}

$seg_exists = is_file("$dir_path/seg.html");
$html_exists = is_file("$dir_path/html.html");

$ex = $seg_exists && $html_exists;
echo $ex ? 'true' : 'false';
