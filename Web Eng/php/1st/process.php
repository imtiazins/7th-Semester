<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subscribe = isset($_POST['subscribe']) ? $_POST['subscribe'] : 0;
$interests = isset($_POST['interests']) ? implode(', ', $_POST['interests']) : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$country = $_POST['country'];
$password = $_POST['password'];

// Insert data into MySQL database
$sql = "INSERT INTO user_info (name, email, message, subscribe, interests, gender, country, password)
        VALUES ('$name', '$email', '$message', '$subscribe', '$interests', '$gender', '$country', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
