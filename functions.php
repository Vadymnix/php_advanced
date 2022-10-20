<?php
/**
 * @param string $type event for create Object
 * @return void
 */
function createItem(string $type) {
    $faker = Faker\Factory::create();

    if ($type) {
        switch ($type) {
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
}