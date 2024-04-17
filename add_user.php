<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $userId = $_POST["userId"];
    $role = $_POST["role"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $password = $_POST["password"];

    // Perform database insertion
    // Modify this section to insert data into your Users table
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

    // SQL query to insert user
    $sql = "INSERT INTO Users (UserID, Role, Name, Email, Address, Password) VALUES ('$userId', '$role', '$name', '$email', '$address', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "New user added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}