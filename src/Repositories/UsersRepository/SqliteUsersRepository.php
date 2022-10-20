<?php

namespace VB\API\BLOG\Repositories\UsersRepository;

use VB\API\BLOG\Blog\UUID;
use VB\API\BLOG\Commands\CommandException;
use VB\API\BLOG\Person\User;
use PDO;
use PDOStatement;

class SqliteUsersRepository implements UsersRepositoryInterface
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
            'INSERT INTO users (first_name, last_name, uuid, username) 
                VALUES (:first_name, :last_name, :uuid, :username)'
        );
        // Выполняем запрос с конкретными значениями
        $statement->execute([
            ':first_name' => $user->getName()->getFirstName(),
            ':last_name' => $user->getName()->getLastName(),
            ':uuid' => $user->getUUID(),
            ':username' => $user->getUsername(),
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

        return $this->getUser($statement, $uuid);
    }

    public function getByUsername(string $username): User
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM users WHERE username = :username'
        );

        if (!$statement) {
            throw new CommandException("variable statement is false");
        }

        $statement->execute([
            ':username' => $username,
        ]);

        if (!$statement) {
            throw new CommandException("variable statement is false");
        }
        return $this->getUser($statement, $username);
    }

    private function getUser(PDOStatement $statement, string $username): User
    {
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if (false === $result) {
            throw new UserNotFoundException(
                "Cannot find user: $username"
            );
        }

        return new User(
            $result['first_name'],
            $result['last_name'],
            new UUID($result['uuid']),
            $result['username']
        );
    }
}