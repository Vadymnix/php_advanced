<?php
spl_autoload_register(function ($class) {
    //$file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    //$tempArr = explode(DIRECTORY_SEPARATOR, $file);
    $tempArr = explode('\\', $class);
    $lastElement = count($tempArr) - 1;
    $tempArr[$lastElement] =  str_replace('_', DIRECTORY_SEPARATOR, $tempArr[$lastElement]);
    $file = __DIR__ . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $tempArr) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});