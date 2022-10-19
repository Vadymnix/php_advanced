<?php

namespace VB\API\BLOG\Blog;

class Comment
{
    private UUID $uuid;
    private UUID $authorUUID;
    private UUID $postUUID;
    private string $comment;

    /**
     * @param UUID $uuid
     * @param UUID $authorUUID
     * @param UUID $postUUID
     * @param string $comment
     */
    public function __construct(
        UUID $uuid,
        UUID $authorUUID,
        UUID $postUUID,
        string $comment)
    {
        $this->uuid = $uuid;
        $this->authorUUID = $authorUUID;
        $this->postUUID = $postUUID;
        $this->comment = $comment;
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
     * @return UUID
     */
    public function getPostUUID(): UUID
    {
        return $this->postUUID;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    public function __toString():string {
        return $this->comment;
    }
}