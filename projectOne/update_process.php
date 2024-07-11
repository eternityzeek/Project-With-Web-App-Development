<?php
session_start();

// Database connection (same as used in register.php)

// Retrieve form data
$username = $_POST['username'];
$email = $_POST['email'];
$current_username = $_SESSION['username']; // Assuming user is logged in

// Prepare and execute SQL query to update user data
$sql = "UPDATE users SET username='$username', email='$email' WHERE username='$current_username'";

if ($conn->query($sql) === TRUE) {
    echo "User info updated successfully!";
    $_SESSION['username'] = $username; // Update session username if changed
} else {
    echo "Error updating user info: " . $conn->error;
}

$conn->close();
?>
