<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $checkUsername = "SELECT id FROM users WHERE username = '$username'";
    $result = $conn->query($checkUsername);

    if ($result->num_rows > 0) {
        echo "Username already exists. Please choose a different username and try again.";
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful. <a href='login.html' style='display: inline-block; padding: 10px 20px; background-color: #00e5ff; color: white; text-align: center; text-decoration: none; border-radius: 4px;'>Go to Login</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>