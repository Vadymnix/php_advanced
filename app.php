<?php
require_once "vendor/autoload.php";
use VB\API\BLOG\Blog\Post;
use VB\API\BLOG\Person\Name;
use VB\API\BLOG\Person\Person;

//use VB\First_Task\Test0;
//use VB\FirstTask\Task0;
//use VB\package_name\Test_Name0;

//require_once "my_loader.php";

//$test = new Test0();
//print_r($test) . PHP_EOL;
//
//$task = new Task0();
//print_r($task) . PHP_EOL;

//!!!!!!!!!!!!!!!!!!!!!!!!!
//$name = new Name0();

$post = new Post(
            new Person(
                new Name('Иван', 'Никитин'),
                new DateTimeImmutable()
            ),
            'Всем привет!'
        );

print $post . PHP_EOL;