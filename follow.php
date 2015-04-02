<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kppl_andy";
	
	$name = $_GET['name'];
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql = 	"UPDATE `profile` SET follower = follower + 1 WHERE username = '".$name."'";
	
	if ($conn->query($sql) === TRUE) {
		header("location:profile.php?name=".$name);
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();

?>
