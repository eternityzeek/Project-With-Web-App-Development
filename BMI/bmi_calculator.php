<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$bmi_result = "";  // Variable to store BMI result message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $height_cm = $_POST['height'];
    $weight = $_POST['weight'];
    
    // Convert height from cm to meters for BMI calculation
    $height_m = $height_cm / 100;

    // Calculate BMI
    $bmi = $weight / ($height_m * $height_m);

    // Insert data into bmi_data table
    $sql = "INSERT INTO bmi_data (user_id, height, weight, bmi_value) VALUES ('$user_id', '$height_cm', '$weight', '$bmi')";

    if ($conn->query($sql) === TRUE) {
        $bmi_result = "Your BMI is " . round($bmi, 2) . ". It has been stored successfully.";
    } else {
        $bmi_result = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMI Calculator</title>
</head>
<body>
    <h2>Calculate Your BMI</h2>
    <form method="post" action="">
        <label for="height">Height (in cm):</label>
        <input type="text" id="height" name="height" required><br><br>
        <label for="weight">Weight (in kg):</label>
        <input type="text" id="weight" name="weight" required><br><br>
        <button type="submit">Calculate BMI</button>
    </form>

    <!-- Display the BMI result -->
    <?php if ($bmi_result) : ?>
        <p><?php echo $bmi_result; ?></p>
    <?php endif; ?>
</body>
</html>
