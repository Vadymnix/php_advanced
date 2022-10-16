<?php

namespace VB\Blog;

use VB\Person\Person;

class Post
{
    private Person $author;
        private string $text;

    public function __construct(Person $author, string $text)
    {
        $this->author = $author;
        $this->text = $text;
    }

    public function __toString()
    {
        return $this->author . ' пишет: ' . $this->text;
    }
}