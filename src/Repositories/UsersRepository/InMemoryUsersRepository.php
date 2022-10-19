<?php

namespace VB\API\BLOG\Repositories\UsersRepository;

use VB\API\BLOG\Person\User;

class InMemoryUsersRepository
{
    /**
     * @var User[]
     */
    private array $users = [];

    /**
     * @param User $user
     */
    public function save(User $user): void
    {
        $this->users[] = $user;
    }

    /**
     * @param UUID $uuid
     * @return User
     * @throws UserNotFoundException
     */
    public function get(UUID $uuid): User
    {
        foreach ($this->users as $user) {
            if ((string)$user->getUUID() === (string)$uuid) {
                return $user;
            }
        }

        throw new UserNotFoundException("User not found: $id");
    }
}