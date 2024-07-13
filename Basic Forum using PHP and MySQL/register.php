<?php
include 'includes/db.php';
include 'classes/User.php';

$user = new User($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->register($username, $email, $password)) {
        echo "Registration successful. <a href='login.php' class='button'>Go to Login</a>";
    } else {
        echo "Error: Registration failed.";
    }
}

include 'views/register_view.php';
?>
