<?php
$directory = 'records/';
$files = array_diff(scandir($directory), array('..', '.'));

$html_files = array_filter($files, function($file) use ($directory)
{
    return pathinfo($directory . $file, PATHINFO_EXTENSION) === 'json';
});

echo json_encode(array_values($html_files));