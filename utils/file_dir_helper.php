<?php

function check_and_create_dir($dir)
{
    if (!file_exists($dir)) {
        mkdir($dir, 0755, true);
    }
}

function copy_recursive($source_dir, $destination_dir)
{
    $dir = opendir($source_dir);
    check_and_create_dir($destination_dir);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($source_dir . '/' . $file)) {
                copy_recursive($source_dir . '/' . $file, $destination_dir . '/' . $file);
            } else {
                copy($source_dir . '/' . $file, $destination_dir . '/' . $file);
            }
        }
    }
    closedir($dir);
    return true;
}
