<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h2><?php echo htmlspecialchars($post_data['title']); ?></h2>
    <p><?php echo htmlspecialchars($post_data['body']); ?></p>
    <p><em>Posted on <?php echo htmlspecialchars($post_data['created_at']); ?> by <?php echo htmlspecialchars($post_data['username']); ?></em></p>
    
    <?php if (isset($message)): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>

    <h3>Comments</h3>
    <form action="post.php?id=<?php echo $post_id; ?>" method="post" class="comment-form">
        <label for="comment">Add a Comment:</label><br>
        <textarea id="comment" name="comment" required></textarea><br>
        <button type="submit" class="button">Submit Comment</button>
    </form>

    <table class="comments-table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Comment</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?php echo htmlspecialchars($comment['username']); ?></td>
                    <td><?php echo htmlspecialchars($comment['comment']); ?></td>
                    <td><?php echo htmlspecialchars($comment['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="dashboard.php" class="button">Back to Dashboard</a>
</body>
</html>
