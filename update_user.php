<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $userIdToUpdate = $_POST["userIdToUpdate"];
    $newRole = $_POST["newRole"];
    $newName = $_POST["newName"];
    $newEmail = $_POST["newEmail"];
    $newAddress = $_POST["newAddress"];
    $newPassword = $_POST["newPassword"];

    // Perform database update
    // Modify this section to update data in your Users table
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

    // SQL query to update user
    $sql = "UPDATE Users
            SET Role='$newRole', Name='$newName', Email='$newEmail', Address='$newAddress', Password='$newPassword'
            WHERE UserID='$userIdToUpdate'";

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}