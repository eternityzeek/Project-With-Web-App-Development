<?php
include 'includes/db.php';
include 'classes/User.php';

$user = new User($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $logged_in_user = $user->login($username, $password);
    if ($logged_in_user) {
        session_start();
        $_SESSION['user_id'] = $logged_in_user['id'];
        header('Location: dashboard.php');
    } else {
        echo "Error: Invalid username or password.";
    }
}

include 'views/login_view.php';
?>
