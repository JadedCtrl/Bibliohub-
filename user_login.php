<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    form {
      max-width: 300px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    input[type="text"],
    input[type="password"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
<h1>User Login</h1>

<form action="login.php" method="post">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>

  <input type="submit" value="Login">
</form>
<h2>User Log</h2>
<table border="1">
  <tr>
    <th>User ID</th>
    <th>Role</th>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>Password</th>
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

  // Select data from Users table
  $sql = "SELECT * FROM Users";
  $result = $conn->query($sql);

  // Output data of each row
  if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" . $row["UserID"] . "</td>";
  echo "<td>" . $row["Role"] . "</td>";
  echo "<td>" . $row["Name"] . "</td>";
  echo "<td>" . $row["Email"] . "</td>";
  echo "<td>" . $row["Address"] . "</td>";
  echo "<td>" . $row["Password"] . "</td>";
  echo "</tr>";
  }
  } else {
  echo "<tr><td colspan='6'>0 results</td></tr>";
  }
  $conn->close();
  ?>
</table>
</body>
</html>