<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class PostLoader
{
    public const JSON_FILE = 'resources/posts.json';
    /**
     * @var Post[]
     */
    private array $posts = [];

    /**
     * PostLoader constructor.
     * @throws Exception
     */
    public function __construct()
    {
        try {
            $postData = json_decode(file_get_contents(self::JSON_FILE), true, 512, JSON_THROW_ON_ERROR);
        }  catch (JsonException $exception) {
            $postData='';
        }

        if (is_array($postData)) {
            foreach ($postData as $post) {
                $postObject = new Post($post['title'], $post['content'], $post['firstName'], $post['lastName']);
                $postObject->setDate(new DateTime($post['date']['date']));
                $this->posts[] = $postObject;
            }
        }
    }

    public function addPost(Post $post): void
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

    /**
     * @throws Exception
     */
    public function save(): void
    {
        try {
            file_put_contents(self::JSON_FILE, json_encode($this->getPosts(), JSON_THROW_ON_ERROR));
        } catch (JsonException $exception) {
            throw new Exception('Error put content');
        }
    }
}

