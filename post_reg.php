<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kppl_andy";
	
	$name=$_POST['name'];
	if($_POST['email1'] != $_POST['email2']){
		die("Email tidak sama");		
	}
	$email=$_POST['email1'];
	if($_POST['password1'] != $_POST['password2']){
		die("Password tidak sama");		
	}
	$pass=$_POST['password1'];
	$dd = $_POST['dd'];
	$mm = $_POST['mm'];
	if(strlen($_POST['tahun']) > 4){
		die("Masukan tahun dengan benar");
	}
	$yyyy = $_POST['tahun'];
	$tanggal = $dd."-".$mm."-".$yyyy;
	$fokus = $_POST['interest'];
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql = 	"INSERT INTO `akun`(`username`, `password`, `email`, `tanggalLahir`, `fokus`)
			VALUES ('".$name."', '".$pass."', '".$email."', STR_TO_DATE('".$tanggal."', '%d-%m-%Y'),'".$fokus."')";
	
	
	if ($conn->query($sql) === TRUE) {
		echo "Data (akun) berhasil ditambahkan. <a href='home.php?name=".$name."'>Masuk sebagai user</a>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$sql2 = "INSERT INTO `volunteer`(`username`, `volunteering`, `influencing`) VALUES ('".$name."',0,0)";
	$conn->query($sql2);
	
	$sql3 = "INSERT INTO `profile`(`username`, `follower`, `following`, `volunteer_in`, `influence_in`, `fokus`) VALUES ('".$name."',0,0,0,0,'".$fokus."')";
	$conn->query($sql3);
	
	$conn->close();
?>
