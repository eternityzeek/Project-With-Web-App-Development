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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    
    $bmi = $weight / ($height * $height);


    $sql = "INSERT INTO bmi_records (user_id, height, weight, bmi) VALUES ('$user_id', '$height', '$weight', '$bmi')";

    if ($conn->query($sql) === TRUE) {
        echo "BMI calculated and saved successfully. Your BMI is: " . round($bmi, 2);
        echo "<br><a href='dashboard.php'>Back to Dashboard</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
