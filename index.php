<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);

require 'classes/Post.php';
require 'classes/PostLoader.php';

try {
    $postData = json_decode(file_get_contents('resources/posts.json'), true, 512, JSON_THROW_ON_ERROR);
}  catch (JsonException $exception) {
    $postData='';
}

$postLoader = new PostLoader();
if (is_array($postData)) {
    $postLoader->setPosts($postData);
}

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
}

try {
    file_put_contents('resources/posts.json', json_encode($postLoader->getPosts(), JSON_THROW_ON_ERROR));
} catch (JsonException $exception) {
    throw new Exception('Error put content');
}

require 'display/header.php';
require 'display/form-view.php';
require 'display/footer.php';