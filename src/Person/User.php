<?php

namespace VB\API\BLOG\Person;

class User extends Person
{
    private int $id;

    /**
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(string $firstName, string $lastName) //может надо добавить id, вопрос работы с БД
    {
        parent::__construct(
            new Name(
                $firstName,
                $lastName
            ),
            new \DateTimeImmutable()
        );
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function __toString()
    {
        return $this->getName()->getFirstName() . " " .
            $this->getName()->getLastName();
    }
}