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

    public function addPost(Post $post)
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

    /**
     * @param array
     */
    public function setPosts(array $postData): void
    {
        foreach ($postData as $post) {
            $postObject = new Post($post['title'], $post['content'], $post['firstName'], $post['lastName']);
            $postObject->setDate(new DateTime($post['date']['date']));
            $this->posts[] = $postObject;
        }
    }

    /**
     * @param int $numberOfPosts
     * @return string
     */
    public function displayPosts(int $numberOfPosts): string
    {
        /**
         * @var Post[] $posts
         */
        $posts = array_slice(array_reverse($this->posts), 0, $numberOfPosts);
        $display = '';
        foreach ($posts as $post) {
            $display.= $post->displayPost();
        }
        return $display;
    }
}

