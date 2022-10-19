<?php

namespace VB\API\BLOG\Blog;

use VB\API\BLOG\Exceptions\InvalidArgumentException;

// Внутри объекта мы храним UUID как строку
class UUID
{
    private string $uuidString;
    /**
     * @throws InvalidArgumentException
     */
    public function __construct(string $uuidString) {
    // Если входная строка не подходит по формату -
    // бросаем исключение InvalidArgumentException

    // Таким образом, мы гарантируем, что если объект
    // был создан, то он точно содержит правильный UUID
            if (!uuid_is_valid($uuidString)) {
                throw new InvalidArgumentException(
                    "Malformed UUID: $uuidString"
                );
            }

            $this->uuidString = $uuidString;
    }

    // c помощью статической функции можно сгенерировать новый UUID
    // и получить его в качестве объекта нашего класса

    /**
     * @throws InvalidArgumentException
     */
    public static function random():self
    {
        return new self(uuid_create(UUID_TYPE_RANDOM));
    }

    public function __toString()
    {
        if (!uuid_is_valid($this->uuidString)) {
            throw new InvalidArgumentException(
                "Malformed UUID: $this->uuidString"
            );
        }

        return $this->uuidString;
    }
}