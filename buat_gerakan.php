<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kppl_andy";
	
	$influence = $_POST['influence'];
	$judul = $_POST['judul'];
	$fokus = $_POST['fokus'];
	$syarat = $_POST['syarat'];
	$deskripsi = $_POST['deskripsi'];
	$dd = $_POST['dd'];
	$mm = $_POST['mm'];
	if(strlen($_POST['tahun']) > 4){
		die("Masukan tahun dengan benar");
	}
	$yyyy = $_POST['tahun'];
	$duedate = $dd."-".$mm."-".$yyyy;
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql = 	"INSERT INTO `motion`(`judul`, `influenced`, `follower`, `deadline`, `fokus`, `syarat`, `deskripsi`)".
			" VALUES ('".$judul."','".$influence."',0, STR_TO_DATE('".$duedate."', '%d-%m-%Y'),'".$fokus."','".$syarat."','".$deskripsi."')";
	
	if ($conn->query($sql) === TRUE) {
		echo "Gerakan berhasil ditambahkan. <a href='home.php?name=".$influence."'>Kembali pada halaman utama</a>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();

?>
