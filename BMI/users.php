<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$current_user_id = $_SESSION['user_id'];
$sql = "SELECT id FROM users ORDER BY id ASC LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$first_user_id = $row['id'];

if ($current_user_id != $first_user_id) {
    echo "Access denied.";
    exit();
}

$sql = "SELECT username, email FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Registered Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f21010;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>All Registered Users</h2>
        <table>
            <tr>
                <th>Username</th>
                <th>Email</th>
            </tr>
            <?php
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
