<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Info</title>
</head>
<body>
    <h2>Update User Info</h2>
    <form action="update_process.php" method="POST">
        <!-- You can populate this form with user's current data fetched from the database -->
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
