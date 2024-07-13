<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Static username and password for validation
$valid_username = "admin";
$valid_password = "123";

if ($username === $valid_username && $password === $valid_password) {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
} else {
    echo "Invalid username or password.";
}
?>
