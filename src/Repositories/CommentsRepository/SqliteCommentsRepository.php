<?php

namespace VB\API\BLOG\Repositories\CommentsRepository;

use VB\API\BLOG\Blog\{Comment, UUID};
use PDO;
use PDOStatement;
use VB\API\BLOG\Exceptions\DontSaveDbException;

class SqliteCommentsRepository implements CommentsRepositoryInterface
{
    private PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @throws DontSaveDbException
     */
    public function save(Comment $comment): void {
        $sql = 'INSERT INTO comments (uuid, post_uuid, author_uuid, comment) 
                VALUES (:uuid, :post, :author, :comment)';
        $statement = $this->pdo->prepare($sql);

        if (!$statement) {
            throw new DontSaveDbException("variable statement is false");
        }

        $statement->execute([
            ':uuid' => $comment->getUUID(),
            ':post' => $comment->getPostUUID(),
            ':author' => $comment->getAuthorUUID(),
            ':comment' => $comment->getComment(),
        ]);
    }

    public function get(UUID $uuid): Comment {
        return Comment::class;
    }
}