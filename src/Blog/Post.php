<?php

namespace VB\API\BLOG\Blog;

class Post
{
    private int $id;
    private int $authorId;
    private string $title;
    private string $text;

    //возможно нужен $id, вопрос генерации $id в БД
    public function __construct(int $authorId, string $title, string $text)
    {
        $this->authorId = $authorId;
        $this->text = $text;
        $this->title = $title;
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
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
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
        return $this->text;
    }
}