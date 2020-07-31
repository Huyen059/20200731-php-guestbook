<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class Post
{
    private string $title, $content, $authorName;
    private DateTime $date;
    /**
     * Post constructor.
     * @param string $title
     * @param string $content
     * @param string $authorName
     * @param DateTime $date
     */
    public function __construct(string $title, string $content, string $authorName)
    {
        $this->title = $title;
        $this->content = $content;
        $this->authorName = $authorName;
        $this->date = new DateTime();
    }


}