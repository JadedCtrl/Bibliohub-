<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
</head>
<body>
<h1>Event Management</h1>

<!-- Form for adding an event -->
<h2>Add Event</h2>
<form action="add_event.php" method="post">
    <!-- Input fields for event details -->
    <label for="eventID">eventID:</label>
    <input type="text" id="eventID" name="eventID" required>
    <br>
    <label for="userID">userID:</label>
    <input type="text" id="userID" name="userID" required>
    <br>
    <label for="eventDate">Event Date:</label>
    <input type="date" id="eventDate" name="eventDate" required>
    <br>
    <label for="eventTitle">Event Title:</label>
    <input type="text" id="eventTitle" name="eventTitle" required>
    <br>
    <label for="eventDescription">Event Description:</label>
    <input type="text" id="eventDescription" name="eventDescription" required>
    <br>
    <button type="submit">Add Event</button>
</form>

<!-- Form for updating an event -->
<h2>Update Event</h2>
<form action="update_event.php" method="post">
    <!-- Input fields for event details -->
    <label for="eventIdToUpdate">Event ID to Update:</label>
    <input type="text" id="eventIdToUpdate" name="eventIdToUpdate" required>
    <br>
    <label for="newEventDate">New Event Date:</label>
    <input type="date" id="newEventDate" name="newEventDate" required>
    <br>
    <label for="newEventTitle">New Event Title:</label>
    <input type="text" id="newEventTitle" name="newEventTitle" required>
    <br>
    <label for="newEventDescription">New Event Description:</label>
    <input type="text" id="newEventDescription" name="newEventDescription" required>
    <br>
    <button type="submit">Update Event</button>
</form>

<!-- Form for deleting an event -->
<h2>Delete Event</h2>
<form action="delete_event.php" method="post">
    <label for="eventIdToDelete">Event ID to Delete:</label>
    <input type="text" id="eventIdToDelete" name="eventIdToDelete" required>
    <br>
    <button type="submit">Delete Event</button>
</form>

<!-- Event Log -->
<h2>Event Log</h2>
<table border="1">
    <tr>
        <th>Event ID</th>
        <th>User ID</th>
        <th>Event Date</th>
        <th>Event Title</th>
        <th>Event Description</th>
    </tr>
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

    // Select data from Events table
    $sql = "SELECT * FROM Events";
    $result = $conn->query($sql);

    // Output data of each row
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["EventID"] . "</td>";
            echo "<td>" . $row["UserID"] . "</td>";
            echo "<td>" . $row["EventDate"] . "</td>";
            echo "<td>" . $row["EventTitle"] . "</td>";
            echo "<td>" . $row["EventDescription"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>0 results</td></tr>";
    }
    $conn->close();
    ?>
</table>
</body>
</html>