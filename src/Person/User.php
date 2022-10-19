<?php

namespace VB\API\BLOG\Person;

use VB\API\BLOG\Blog\UUID;

class User extends Person
{
    private UUID $uuid;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param UUID $uuid
     */
    public function __construct(
        string $firstName,
        string $lastName,
        UUID $uuid
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