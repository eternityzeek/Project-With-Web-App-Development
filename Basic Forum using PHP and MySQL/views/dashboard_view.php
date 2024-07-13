<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h2>Welcome to the Forum</h2>
    
    <?php if (isset($message)): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>

    <form action="dashboard.php" method="post" class="post-form">
        <h3>Ask your Question or start a Discussion</h3>
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br>
        <label for="body">Body:</label><br>
        <textarea id="body" name="body" required></textarea><br>
        <button type="submit" class="button">Create</button>
    </form>

    <h3>All Posts</h3>
    <table class="posts-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?php echo htmlspecialchars($post['title']); ?></td>
                    <td><?php echo htmlspecialchars($post['body']); ?></td>
                    <td><?php echo htmlspecialchars($post['created_at']); ?></td>
                    <td><a href="post.php?id=<?php echo $post['id']; ?>" class="button">View Post</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <a href="logout.php" class="button">Logout</a>
</body>
</html>
