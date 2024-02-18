<?php
// Assuming you have a MySQL database setup with the following credentials
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$rollNumber = $_POST['rollNumber'];
$subject1 = $_POST['subject1'];
$subject2 = $_POST['subject2'];
$subject3 = $_POST['subject3'];

// Insert data into MySQL database
$sql = "INSERT INTO student_info (name, roll_number, subject1, subject2, subject3)
        VALUES ('$name', '$rollNumber', $subject1, $subject2, $subject3)";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
