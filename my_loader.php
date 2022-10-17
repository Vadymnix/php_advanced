<?php
spl_autoload_register(function ($class) {
    print_r($class);
    echo PHP_EOL;
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    $tempArr = explode(DIRECTORY_SEPARATOR, $file);
    $lastElement = count($tempArr) - 1;
    $tempArr[$lastElement] =  str_replace('_', DIRECTORY_SEPARATOR, $tempArr[$lastElement]);
    $file = implode(DIRECTORY_SEPARATOR, $tempArr);

    print_r($file);
    echo PHP_EOL;

    if (file_exists($file)) {
        require $file;
    }
});