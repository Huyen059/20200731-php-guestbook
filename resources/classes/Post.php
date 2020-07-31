<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class Post
{
    private string $title, $content, $firstName, $lastName;
    private DateTime $date;

    /**
     * Post constructor.
     * @param string $title
     * @param string $content
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(string $title, string $content, string $firstName, string $lastName)
    {
        $this->title = $title;
        $this->content = $content;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->date = new DateTime();
    }

}