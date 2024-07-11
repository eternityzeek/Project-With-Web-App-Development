<?php
// Database connection
$host = 'localhost';
$user = 'root'; // your MySQL username
$password = ''; // your MySQL password
$database = 'user_management'; // your database name

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security

// Prepare and execute SQL query to insert data into users table
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
    echo '<button onclick="location.href=\'login.html\'">Go to Login</button>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
