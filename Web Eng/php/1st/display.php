<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the last inserted record from the database
$sql = "SELECT * FROM user_info ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h2>Stored Information</h2>";
    echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
    echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
    echo "<p><strong>Message:</strong> " . $row['message'] . "</p>";
    echo "<p><strong>Subscribe to Newsletter:</strong> " . ($row['subscribe'] ? 'Yes' : 'No') . "</p>";
    echo "<p><strong>Interests:</strong> " . $row['interests'] . "</p>";
    echo "<p><strong>Gender:</strong> " . $row['gender'] . "</p>";
    echo "<p><strong>Country:</strong> " . $row['country'] . "</p>";
} else {
    echo "No records found";
}

$conn->close();
?>
