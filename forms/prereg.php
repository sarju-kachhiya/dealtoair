<?php
// Database connection
$host = "localhost";    // Your database host
$user = "cgtbycom_dealtoair_user";         // Your DB username
$pass = "Dealtoair$2025";             // Your DB password
$dbname = "cgtbycom_dealtoair_db";  // Your database name

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Collect form data
$full_name = isset($_POST['full_name']) ? $conn->real_escape_string($_POST['full_name']) : '';
$zip       = isset($_POST['zip']) ? $conn->real_escape_string($_POST['zip']) : '';
$email     = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
$address   = isset($_POST['address']) ? $conn->real_escape_string($_POST['address']) : '';

// Insert into database
$sql = "INSERT INTO leads (full_name, zip, email, address) 
        VALUES ('$full_name', '$zip', '$email', '$address')";

if ($conn->query($sql) === TRUE) {
    // Redirect to coreg.html after successful save
    header("Location: coreg.html");
    exit();
} else {
    header("Location: 404.html");
    exit();
}

$conn->close();
?>
