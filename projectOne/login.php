<?php
session_start();

// Database connection details
$host = 'localhost'; // Change this to your MySQL server address if different
$user = 'root'; // Change this to your MySQL username
$password = ''; // Change this to your MySQL password, if set
$database = 'user_management'; // Change this to your database name

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Query to fetch user data based on username
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result && $result->num_rows == 1) {
    // Verify password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $username;
        echo "Login successful!";
        // Redirect to dashboard or any other authenticated page
    } else {
        echo "Incorrect password";
    }
} else {
    echo "User not found";
}

$conn->close(); // Close the database connection at the end
?>
