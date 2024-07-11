<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.html");
    exit;
}

echo "Welcome, " . $_SESSION['username'] . "!<br>";
?>
<a href="logout.html">Logout</a>