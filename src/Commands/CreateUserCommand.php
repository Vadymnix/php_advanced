<?php

namespace VB\API\BLOG\Commands;

use VB\API\BLOG\Person\User;
use VB\API\BLOG\Blog\UUID;
use VB\API\BLOG\Repositories\UsersRepository\{
    UserNotFoundException,
    UsersRepositoryInterface
};

class CreateUserCommand
{
    private UsersRepositoryInterface $usersRepository;

    public function __construct(UsersRepositoryInterface $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function handle(Arguments $arguments): void
    {
        $username = $arguments->get('username');

        // Проверяем, существует ли пользователь в репозитории
        if ($this->userExists($username)) {
            // Бросаем исключение, если пользователь уже существует
            throw new UserNotFoundException("User already exists: $username");
        }

        // Сохраняем пользователя в репозиторий
        $this->usersRepository->save(
            new User(
                $arguments->get('first_name'),
                $arguments->get('last_name'),
                UUID::random(),
                $username
            )
        );
    }

    private function userExists(string $username): bool
    {
        try {
        // Пытаемся получить пользователя из репозитория
            $this->usersRepository->getByUsername($username);
        } catch (UserNotFoundException $error) {
            return false;
        }
        return true;
    }
}

