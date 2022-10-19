<?php
namespace VB\API\BLOG\Repositories\UsersRepository;

use VB\API\BLOG\Blog\UUID;
use VB\API\BLOG\Person\User;

interface UsersRepositoryInterface {
    public function save(User $user): void;
    public function get(UUID $uuid): User;
    public function getByUsername(string $username): User;
}