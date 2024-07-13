<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

include 'includes/db.php';
include 'classes/Post.php';

$post = new Post($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $user_id = $_SESSION['user_id'];

    if ($post->createPost($user_id, $title, $body)) {
        $message = "Post created successfully.";
    } else {
        $message = "Error: Could not create post.";
    }
}

$posts = $post->getPosts();

include 'views/dashboard_view.php';
?>
