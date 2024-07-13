<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h2>Comments</h2>
    <form action="comment.php" method="post">
        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
        <textarea name="body" required></textarea><br>
        <button type="submit" class="button">Add Comment</button>
    </form>

    <?php foreach ($comments as $comment): ?>
        <div>
            <p><?php echo $comment['body']; ?></p>
            <p>by <?php echo $comment['username']; ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>
