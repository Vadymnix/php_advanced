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
use VB\API\BLOG\Repositories\PostsRepository\SqlitePostsRepository;
use VB\API\BLOG\Repositories\CommentsRepository\SqliteCommentsRepository;

$pdo = new PDO('sqlite:' . __DIR__ . '/blog.db');
$faker = Faker\Factory::create();

//Тест для добавления Юзверя
//$usersRepository = new SqliteUsersRepository(
//    $pdo)
//);
//$usersRepository->save(new User('Ivan', 'Nikitin', UUID::random()));
//$usersRepository->save(new User('Anna', 'Petrova', UUID::random()));

try {

    $postsRepo = new SqlitePostsRepository($pdo);
//тест для добавления Post
//    $postsRepo->save(
//        new Post(
//            UUID::random(),
//            new UUID('a5587e4c-ac9d-4754-ac5c-fcfb528b5374'),
//            $faker->text(20),
//            $faker->paragraph()
//        )
//    );
//    echo "POST --- " .
//        $postsRepo->get(new UUID('909a9d0d-e67a-4aec-8597-75a53db24aac')) . PHP_EOL;

//Тест для добавления комментария
      $commentRepo = new SqliteCommentsRepository($pdo);
//    $commentRepo->save(
//        new Comment(
//            UUID::random(),
//            new UUID('a5587e4c-ac9d-4754-ac5c-fcfb528b5374'),
//            new UUID('909a9d0d-e67a-4aec-8597-75a53db24aac'),
//            $faker->paragraph()
//        )
//    );
    echo "COMMENT --- " . $commentRepo->get(new UUID('8981646b-4a6e-4b12-9c1b-28d9e1137f77')) . PHP_EOL;
} catch (AppException $e) {
    echo $e->getMessage() . PHP_EOL;
}


////////////////////////////////
///Example l-2 method
//$command = new CreateUserCommand($usersRepository);
//try {
//    $command->handle(Arguments::fromArgv($argv));
//}
//catch (AppException $e) {
//    echo "{$e->getMessage()}\n" . PHP_EOL;
//}
/////////////////////////////////

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