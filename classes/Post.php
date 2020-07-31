<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

class Post implements JsonSerializable
{
    private string $title, $content, $firstName, $lastName;
    private DateTime $date;
    private array $emojis = [
        ':-)' => '&#128512;',
        ';-)' => '&#128521;',
        ':-(' => '&#128543;'
    ];

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

    /**
     * @return array|mixed
     */
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

    /**
     * @return string
     */
    public function displayPost(): string
    {
        foreach ($this->emojis as $smiley => $emoji) {
            $newContent = str_replace($smiley, $emoji, $this->content);
            $this->content = $newContent;
        }
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