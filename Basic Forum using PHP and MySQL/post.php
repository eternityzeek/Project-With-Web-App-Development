<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

include 'includes/db.php';
include 'classes/Post.php';
include 'classes/Comment.php';

$post = new Post($conn);
$comment = new Comment($conn);

$post_id = $_GET['id'];
$post_data = $post->getPostById($post_id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment_text = $_POST['comment'];
    $user_id = $_SESSION['user_id'];

    if ($comment->createComment($post_id, $user_id, $comment_text)) {
        $message = "Comment added successfully.";
    } else {
        $message = "Error: Could not add comment.";
    }
}

$comments = $comment->getCommentsByPostId($post_id);

include 'views/post_view.php';
?>
