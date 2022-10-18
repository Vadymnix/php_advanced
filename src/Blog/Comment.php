<?php

namespace VB\API\BLOG\Blog;

class Comment
{
    private int $id;
    private int $authorId;
    private int $postId;
    private string $comment;

    /**
     * @param int $authorId
     * @param int $postId
     * @param string $comment
     */
    public function __construct(int $authorId, int $postId, string $comment)
    {
        $this->authorId = $authorId;
        $this->postId = $postId;
        $this->comment = $comment;
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
     * @return int
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param int $comment
     */
    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    public function __toString():string {
        return $this->comment;
    }
}