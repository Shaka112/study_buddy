<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Group</title>
</head>
<body>
<h2>Insert Group</h2>

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

$groupID = $_POST["groupID"];
$groupName = $_POST["groupName"];
$topics = $_POST["topics"];
$totalMembers = $_POST["totalMembers"];
$adminID = $_POST["adminID"];

$sql = "INSERT INTO Groups (groupID, groupName, topics, totalMembers, adminID)
VALUES ('$groupID', '$groupName', '$topics', '$totalMembers', '$adminID')";


if ($conn->query($sql) == TRUE) {
  echo "New record inserted successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<br><br>
<a href="index.html">Back to main menu</a>
</body>
</html>