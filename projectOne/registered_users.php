<?php
session_start();

// Database connection (same as used in register.php)

// Fetch first registered user's information
$sql = "SELECT * FROM users ORDER BY id LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h2>Registered User Details</h2>";
    echo "<p>Username: " . $row['username'] . "</p>";
    echo "<p>Email: " . $row['email'] . "</p>";
    echo "<p>Registered At: " . $row['created_at'] . "</p>";
} else {
    echo "No users found.";
}

$conn->close();
?>
