<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kppl_andy";
	
	$user=$_POST['username'];
    $pass=$_POST['password'];
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}	

	$sql = "SELECT username, password FROM akun WHERE username = '".$user."' AND password = '".$pass."'";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
		header("location:home.php?name=".$user."");
	} else {
		echo "Wrong Username or Password";
	}
	
	
	mysqli_close($conn);
	
?>
