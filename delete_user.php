<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $userIdToDelete = $_POST["userIdToDelete"];

    // Perform database deletion
    // Modify this section to delete data from your Users table
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

    // SQL query to delete user
    $sql = "DELETE FROM Users WHERE UserID='$userIdToDelete'";

    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}