<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class PostLoader
{
    /**
     * @var Post[]
     */
    private array $posts = [];

    /**
     * PostLoader constructor.
     * @param Post $post
     */
    public function addPost (Post $post)
    {
        $this->posts[] = $post;
    }

    /**
     * @return Post[]
     */
    public function getPosts(): array
    {
        return $this->posts;
    }


}

