<?php
use VB\Blog\Post;
use VB\Person\Name;
use VB\Person\Person;
use VB\First_Task\Test0;
use VB\FirstTask\Task0;
use VB\package_name\Test_Name0;

spl_autoload_register(function ($class) {
    print_r($class);
    echo PHP_EOL;
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    $tempArr = explode(DIRECTORY_SEPARATOR, $file);
    $lastElement = count($tempArr) - 1;
    $tempArr[$lastElement] =  str_replace('_', DIRECTORY_SEPARATOR, $tempArr[$lastElement]);
    $file = implode(DIRECTORY_SEPARATOR, $tempArr);
//
//    print_r($file);
//    echo PHP_EOL;

    if (file_exists($file)) {
        require $file;
    }
});

$test = new Test0();
print_r($test) . PHP_EOL;

$task = new Task0();
print_r($task) . PHP_EOL;

//!!!!!!!!!!!!!!!!!!!!!!!!!
$name = new Name0();

//$post = new Post(
//            new Person(
//                new Name('Иван', 'Никитин'),
//                new DateTimeImmutable()
//            ),
//            'Всем привет!'
//        );

//print $post . PHP_EOL;