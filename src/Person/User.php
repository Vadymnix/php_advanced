<?php

namespace VB\API\BLOG\Person;

class User extends Person
{
    private int $id;
    private Person $person;

    /**
     * @param Person $person
     */
    public function __construct(Person $person) //может надо добавить id, вопрос работы с БД
    {
        $this->person = $person;
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

    /**
     * @return Person
     */
    public function getPerson(): Person
    {
        return $this->person;
    }
}