<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Group</title>
</head>

<body>
<h2>Delete group</h2>

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
$sql1 = "SELECT groupID, groupName, topics, totalMembers, adminID FROM Groups WHERE groupID = '$groupID'";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
  // delete row   	  
	$sql2 = "DELETE FROM Groups WHERE groupID = '$groupID'";
	$result2 = $conn->query($sql2);
	
	$row = $result1->fetch_row();
	echo "<b>The Group below was deleted successfully:</b> <br><br>groupID: " .$row[0]. 
	" <br>Group Name: $row[1] <br> topics: $row[2] <br> totalMembers: $row[3] <br> adminID: $row[4] <br>";	 
} else {
  echo "Group does not exist!";
}

$conn->close();
?>

<br><br>
<a href="index.html">Back to main menu</a>

</body>
</html>