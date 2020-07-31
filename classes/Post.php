<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class Post implements JsonSerializable
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

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    public function jsonSerialize()
    {
        return [
          'title' => $this->title,
          'content' => $this->content,
          'firstName' => $this->firstName,
          'lastName' => $this->lastName,
          'date' => $this->date
        ];
    }



    public function displayPost(): string
    {
        return "
    <div class='col-sm-6 col-md-3 my-3'>
        <div class='card text-center'>
            <div class='card-body'>
                <h5 class='card-title'>{$this->title}</h5>
                <p class='card-text'>{$this->date->format('D M d H:i')}</p>
                <p class='card-text'>Author: {$this->firstName} {$this->lastName}</p>
                <p class='card-text'>Content: {$this->content}</p>
            </div>
        </div>
    </div>
        ";
    }
}