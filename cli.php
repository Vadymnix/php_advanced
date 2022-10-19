<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/functions.php";

use VB\API\BLOG\Person\User;
use VB\API\BLOG\Blog\{Post, Comment, UUID};
use VB\API\BLOG\Repositories\UsersRepository\{
    InMemoryUsersRepository,
    UserNotFoundException,
    SqliteUsersRepository,
};
use VB\API\BLOG\Commands\{
    CreateUserCommand,
    CommandException,
    Arguments
};
use B\API\BLOG\Exceptions\AppException;

$usersRepository = new SqliteUsersRepository(
    new PDO('sqlite:' . __DIR__ . '/blog.db')
);
//
//$usersRepository->save(new User('Ivan', 'Nikitin', UUID::random()));
//$usersRepository->save(new User('Anna', 'Petrova', UUID::random()));

$command = new CreateUserCommand($usersRepository);
try {
    $command->handle(Arguments::fromArgv($argv));
}
catch (AppException $e) {
    echo "{$e->getMessage()}\n" . PHP_EOL;
}

//LESSON-1
////Создаём объект репозитория
//$usersRepository = new InMemoryUsersRepository();
////Добавляем в репозиторий несколько пользователей
//$user = new User('Ivan', 'Nikitin');
//$user->setId(123);
//$usersRepository->save($user);
//$user = new User('Anna', 'Petrova');
//$user->setId(234);
//$usersRepository->save($user);
//
//try {
////Загружаем пользователя из репозитория
//    $user = $usersRepository->get(333);
//    print $user->name();
//} catch (UserNotFoundException $e) {
//    print $e->getMessage() . PHP_EOL;
//}