<?php
require_once __DIR__ . "/vendor/autoload.php";
use VB\API\BLOG\Person\User;
use VB\API\BLOG\Blog\{Post, Comment};

$faker = Faker\Factory::create();

if (isset($argv[1])) {
    switch ($argv[1]) {
        case 'user' :
            $user = new User( $faker->firstName(), $faker->lastName());
            echo $user . PHP_EOL;
            break;
        case 'post':
            $post = new Post($faker->imei(), $faker->paragraph(1), $faker->text());
            echo $post .PHP_EOL;
            break;
        case 'comment':
            $comment = new Comment($faker->imei(), $faker->imei(), $faker->text());
            echo $comment . PHP_EOL;
            break;
        default:
            echo "unknowing argument" . PHP_EOL;
    }
}

