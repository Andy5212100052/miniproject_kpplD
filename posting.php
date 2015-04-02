<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kppl_andy";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	$username = $_POST['usernm'];
	$posting = $_POST['new'];
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		header("location:home.php?name=".$username."");
	}
	
	$sql = "INSERT INTO `posting`(`username`, `post`) VALUES ('".$username."','".$posting."')";
	
	$conn->query($sql);
	header("location:home.php?name=".$username."");
	
	mysqli_close($conn);							
?>
