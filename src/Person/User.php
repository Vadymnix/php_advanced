<?php

namespace VB\API\BLOG\Person;

use VB\API\BLOG\Blog\UUID;

class User extends Person
{
    private UUID $uuid;
    private string $username;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $firstName
     * @param string $lastName
     * @param UUID $uuid
     */
    public function __construct(
        string $firstName,
        string $lastName,
        UUID $uuid,
        $username
    )
    {
        parent::__construct(
            new Name(
                $firstName,
                $lastName
            ),
            new \DateTimeImmutable()
        );

        $this->uuid = $uuid;
        $this->username = $username;
    }

    /**
     * @return UUID
     */
    public function getUUID(): UUID
    {
        return $this->uuid;
    }

    public function __toString()
    {
        return $this->getName()->getFirstName() . " " .
            $this->getName()->getLastName();
    }
}