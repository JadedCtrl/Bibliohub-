<?php
// Database connection parameters
$servername = "localhost";
$username = "veom-mysql";
$password = "nemade777";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $eventID = $_POST["eventID"];
    $userID = $_POST["userID"];
    $eventDate = $_POST["eventDate"];
    $eventTitle = $_POST["eventTitle"];
    $eventDescription = $_POST["eventDescription"];

    // SQL to insert into Events
    $sql = "INSERT INTO Events (EventID, UserID, EventDate, EventTitle, EventDescription) VALUES ('$eventID', '$userID', '$eventDate', '$eventTitle', '$eventDescription')";

    if ($conn->query($sql) === TRUE) {
        echo "Event added successfully";
    } else {
        echo "Error adding event: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
