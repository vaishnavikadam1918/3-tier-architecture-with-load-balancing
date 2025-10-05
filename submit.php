<?php
// Database configuration
$servername = "localhost"; // or your RDS endpoint
$username = "root";        // DB username
$password = "your_password"; // DB password
$dbname = "facebook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from form
$name = $_POST['name'];
$city = $_POST['city'];

// Insert into database
$sql = "INSERT INTO users (name, city) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $city);

if ($stmt->execute()) {
    echo "Record submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
