<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

require 'classes/Post.php';
require 'classes/PostLoader.php';

$postLoader = new PostLoader();

if (isset($_POST['submit'])) {
    $title = htmlspecialchars(trim($_POST['title']));
    $firstName = htmlspecialchars(trim($_POST['firstName']));
    $lastName = htmlspecialchars(trim($_POST['lastName']));
    $content = htmlspecialchars(trim($_POST['content']));
    if (empty($title) || empty($firstName) || empty($lastName) || empty($content)) {
        throw new Exception("All the fields are required.");
    }
    $post = new Post($title, $content, $firstName, $lastName);
    $postLoader->addPost($post);
    $postLoader->save();
}



require 'display/header.php';
require 'display/form-view.php';
require 'display/footer.php';