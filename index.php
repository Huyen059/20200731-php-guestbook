<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

require 'resources/classes/Post.php';
require 'resources/classes/PostLoader.php';

session_start();

if (isset($_POST['submit'])) {
    $title = htmlspecialchars(trim($_POST['title']));
    $firstName = htmlspecialchars(trim($_POST['firstName']));
    $lastName = htmlspecialchars(trim($_POST['lastName']));
    $content = htmlspecialchars(trim($_POST['content']));
    if (empty($title) || empty($firstName) || empty($lastName) || empty($content)) {
        throw new Exception("All the fields are required.");
    }
    $post = new Post($title, $content, $firstName, $lastName);
    /**
     * @var PostLoader $postLoader
     */
    if (isset($_SESSION['postLoader'])) {
        $postLoader = $_SESSION['postLoader'];
    } else {
        $postLoader = new PostLoader();
        $_SESSION['postLoader'] = $postLoader;
    }
    $postLoader->addPost($post);
}




echo 'hi';

require 'resources/header.php';
require 'resources/form-view.php';
require 'resources/footer.php';