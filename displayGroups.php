<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Groups</title>

    <style>
    table {
    border-collapse: collapse;
    width: 100%;
    }

    th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    }

    tr:hover 
        {background-color: cyan;}

    a {
        text-decoration: none;
    }
    </style>

</head>
<body>

<h2>Groups Lists</h2>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "bmcc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT groupID, groupName, topics, totalMembers, adminID FROM Groups";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<table><tr><th>groupID</th><th>Group Name</th><th>Subjects</th><th>Total Members</th><th>adminID</th></tr>";
  while($row = $result->fetch_assoc()) {    
	echo "<tr><td>$row[groupID]</td><td>$row[groupName]</td><td>$row[topics]</td><td>$row[totalMembers]</td><td>$row[adminID]</td></tr>";	
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>

<br><br>
<a href="index.html">Back to main menu</a>

</body>
</html>