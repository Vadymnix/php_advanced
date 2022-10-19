<?php

namespace VB\API\BLOG\Repositories\UsersRepository;

use VB\API\BLOG\Blog\UUID;
use VB\API\BLOG\Person\User;
use PDO;

class SqliteUsersRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save(User $user): void
    {
        // Подготавливаем запрос
        $statement = $this->pdo->prepare(
            'INSERT INTO users (first_name, last_name, uuid) 
                VALUES (:first_name, :last_name, :uuid)'
        );
        // Выполняем запрос с конкретными значениями
        $statement->execute([
            ':first_name' => $user->getName()->getFirstName(),
            ':last_name' => $user->getName()->getLastName(),
            ':uuid' => $user->getUUID(),
        ]);
    }

    public function get(UUID $uuid): User
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM users WHERE uuid = ?'
        );
        $statement->execute([
            ':uuid' => (string)$uuid,
        ]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        // Бросаем исключение, если пользователь не найден
        if (false === $result) {
            throw new UserNotFoundException(
                "Cannot get user: $uuid"
            );
        }

        return new User(
            $result['first_name'],
            $result['last_name'],
            new UUID($result['uuid'])
        );
    }
}