<?php

namespace VB\API\BLOG\Repositories\PostsRepository;

use VB\API\BLOG\Blog\{ Post, UUID};

interface PostsRepositoryInterface
{
    public function save(Post $post): void;
    public function get(UUID $uuid): Post;
}