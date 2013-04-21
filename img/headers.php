<?php 
$files = array();

$dir = opendir('./header');
while ($file = readdir($dir)) {
    if ($file == '.' || $file == '..' || $file == '.htaccess') {
        continue;
    }

    $files[] = $file;
}
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 36000));
header('Content-type: application/json');
echo json_encode($files);
?>