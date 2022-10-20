<?php

namespace VB\API\BLOG\Repositories\CommentsRepository;

use VB\API\BLOG\Blog\{Comment, UUID};

interface CommentsRepositoryInterface
{
    public function save(Comment $comment): void;
    public function get(UUID $uuid): Comment;
}