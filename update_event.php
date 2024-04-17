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
    $eventIdToUpdate = $_POST["eventIdToUpdate"];
    $newEventDate = $_POST["newEventDate"];
    $newEventTitle = $_POST["newEventTitle"];
    $newEventDescription = $_POST["newEventDescription"];
    // SQL to update event
    $sql = "UPDATE Events SET EventDate='$newEventDate', EventTitle='$newEventTitle', EventDescription = '$newEventDescription'  WHERE EventID='$eventIdToUpdate'";

    if ($conn->query($sql) === TRUE) {
        echo "Event updated successfully";
    } else {
        echo "Error updating event: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();