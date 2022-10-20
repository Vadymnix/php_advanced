<?php

namespace VB\API\BLOG\Blog;

class Post
{
    private UUID $uuid;
    private UUID $authorUUID;
    private string $title;
    private string $text;

    //возможно нужен $id, вопрос генерации $id в БД
    public function __construct(
        UUID $uuid,
        UUID $authorUUID,
        string $title,
        string $text
    )
    {
        $this->uuid = $uuid;
        $this->authorUUID = $authorUUID;
        $this->text = $text;
        $this->title = $title;
    }

    /**
     * @return UUID
     */
    public function getUUID(): UUID
    {
        return $this->uuid;
    }

    /**
     * @return UUID
     */
    public function getAuthorUUID(): UUID
    {
        return $this->authorUUID;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    public function __toString()
    {
        return $this->title . " >>> " . $this->text;
    }
}