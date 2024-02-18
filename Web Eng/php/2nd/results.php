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

// Retrieve student information from the database
$sql = "SELECT * FROM student_info ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalMarks = $row['subject1'] + $row['subject2'] + $row['subject3'];
    $averageMarks = $totalMarks / 3;
    $gpa = calculateGPA($averageMarks);

    echo "<h2>Student Results (GPA System)</h2>";
    echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
    echo "<p><strong>Roll Number:</strong> " . $row['roll_number'] . "</p>";
    echo "<p><strong>Subject 1 Marks:</strong> " . $row['subject1'] . "</p>";
    echo "<p><strong>Subject 2 Marks:</strong> " . $row['subject2'] . "</p>";
    echo "<p><strong>Subject 3 Marks:</strong> " . $row['subject3'] . "</p>";
    echo "<p><strong>Total Marks:</strong> " . $totalMarks . "</p>";
    echo "<p><strong>Average Marks:</strong> " . number_format($averageMarks, 2) . "</p>";
    echo "<p><strong>GPA:</strong> " . number_format($gpa, 2) . "</p>";
} else {
    echo "No records found";
}

// Function to calculate GPA based on average marks
function calculateGPA($averageMarks) {
    if ($averageMarks >= 90) {
        return 4.0;
    } elseif ($averageMarks >= 80) {
        return 3.5;
    } elseif ($averageMarks >= 70) {
        return 3.0;
    } elseif ($averageMarks >= 60) {
        return 2.5;
    } elseif ($averageMarks >= 50) {
        return 2.0;
    } elseif ($averageMarks >= 40) {
        return 1.0;
    } else {
        return 0.0;
    }
}

// Close the database connection
$conn->close();
?>
