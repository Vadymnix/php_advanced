<?php

namespace VB\API\BLOG\Repositories\PostsRepository;

use VB\API\BLOG\Blog\{Post, UUID};
use PDO;
use PDOStatement;
use VB\API\BLOG\Exceptions\DontSaveDbException;
use VB\API\BLOG\Exceptions\InvalidArgumentException;

class SqlitePostsRepository implements PostsRepositoryInterface
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
    public function save(Post $post): void {
        $sql = 'INSERT INTO posts (uuid, author_uuid, title, post) 
                VALUES (:uuid, :author, :title, :post)';
        $statement = $this->pdo->prepare($sql);

        if (!$statement) {
            throw new DontSaveDbException("variable statement is false");
        }

        $statement->execute([
            ':uuid' => $post->getUUID(),
            ':author' => $post->getAuthorUUID(),
            ':title' => $post->getTitle(),
            ':post' => $post->getText(),
        ]);
    }

    /**
     * @param UUID $uuid
     * @return Post
     * @throws InvalidArgumentException
     * @throws PostNotFoundException
     */
    public function get(UUID $uuid): Post {
        $sql = "SELECT * FROM  posts WHERE uuid=:uuid";
        $statement = $this->pdo->prepare($sql);

        if (!$statement) {
            throw new PostNotFoundException("Ошибка в подготовке");
        }

        if(!$statement->execute([':uuid' => $uuid]) ) {
            throw new PostNotFoundException("Ошибка в выполнении");
        }

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            throw new PostNotFoundException();
        }

        return new Post(
            new UUID($result['uuid']),
            new UUID($result['author_uuid']),
            $result['title'],
            $result['post'],
        );
    }
}