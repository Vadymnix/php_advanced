<?php
use VB\Blog\Post;
use VB\Person\Name;
use VB\Person\Person;

spl_autoload_register(function ($class) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

$post = new Post(
            new Person(
                new Name('Иван', 'Никитин'),
                new DateTimeImmutable()
            ),
            'Всем привет!'
        );

print $post . PHP_EOL;