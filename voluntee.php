<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kppl_andy";
	
	$name = $_GET['name'];
	$id = $_GET['id'];
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql = 	"UPDATE `motion` SET volunteer = volunteer + 1 WHERE M_ID = '".$id."'";
	
	if ($conn->query($sql) === TRUE) {
		header("location:gerakan3.php?name=".$name."&id=".$id);
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();

?>
