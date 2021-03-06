<?php
declare(strict_types=1);
ini_set('display_errors', "1");
ini_set('display_startup_errors', "1");
error_reporting(E_ALL);
?>

<div class="container my-5">
    <form method="post">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="3"></textarea>
        </div>
        <button type="submit" name="submit" class="w-100 btn btn-primary">Post</button>
    </form>
    <form method="post" class="my-5">
        <label>
            Number of posts to be displayed:
            <input type="number" name="numberOfPost" value="<?php echo ($_POST['numberOfPost']) ?? 20; ?>">
            <button type="submit">Display</button>
        </label>
    </form>
    <div class="row">
        <?php
        $numberOfPosts = 20;
        if(isset($_POST['numberOfPost'])){
            /**
             * @var PostLoader $postLoader
             */
            $numberOfPosts = (int)htmlspecialchars(trim($_POST['numberOfPost']));
        }
        echo $postLoader->displayPosts($numberOfPosts);
        ?>
    </div>
</div>

