<!DOCTYPE html>
<html>
<body>

<h2>Update Group</h2>

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

$sql = "SELECT groupID, groupName, totalMembers, adminID FROM Groups WHERE groupID = '$groupID'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Update row   	  
	$sql = "UPDATE Groups SET groupName = '$groupName', totalMembers = '$totalMembers', topics = '$topics', adminID = '$adminID' WHERE groupID = '$groupID'";
	$result = $conn->query($sql);
	echo "Record updated successfully"; 
} else {
  echo "Group does not exist!";
}

$conn->close();
?>

<br><br>
<a href="index.html">Back to main menu</a>

</body>
</html>