<?php

namespace VB\API\BLOG\Repositories\CommentsRepository;

use VB\API\BLOG\Blog\{Comment, UUID};
use PDO;
use PDOStatement;
use VB\API\BLOG\Exceptions\DontSaveDbException;
use VB\API\BLOG\Exceptions\InvalidArgumentException;

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

    /**
     * @throws CommentNotFoundException
     * @throws InvalidArgumentException
     */
    public function get(UUID $uuid): Comment {
        $sql = "SELECT * FROM  comments WHERE uuid=:uuid";
        $statement = $this->pdo->prepare($sql);

        if (!$statement) {
            throw new CommentNotFoundException("Ошибка в подготовке");
        }

        if(!$statement->execute([':uuid' => $uuid]) ) {
            throw new CommentNotFoundException("Ошибка в исполнении");
        }

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            throw new CommentNotFoundException("Ошибка в фетч");
        }

        return new Comment(
            new UUID($result['uuid']),
            new UUID($result['post_uuid']),
            new UUID($result['author_uuid']),
            $result['comment'],
        );
    }
}