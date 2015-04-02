<!DOCTYPE html>

		
<html>
    <head>
        <title>RELAWAN ONLINE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/gerakan3.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		
		<style type="text/css">
			ul {list-style: none; padding: 0px; margin: 0px;}
			ul li {display: block; position: relative; float: right; border: 1px solid #000; margin-right: 40px; width: 120px;}
			li ul {display: none;}
			ul li a {display: block; background: #000; padding: 5px 10px 5px 10px; text-decoration: none; white-space: nowrap; color: #fff;}
			ul li a:hover {background: #f00;}
			li:hover ul {display: block; position: absolute;}
			li:hover li {float: none;}
			li:hover a {background: #f00;}
			li:hover li a:hover {background: #000;}
			#drop-nav li ul li {border-top: 0px;}
		</style>
		
    </head>
    <body>
        <div>
            <div id="atas">
                <div id="nama-atas">
                    <strong>RELAWAN ONLINE</strong>
                </div>
                
                <div id="sub-nama-atas">
                    relawan-online.com
                </div>
                <ul id="drop-nav">
					<li><a href="#">Menu</a>
						<ul>
							<li><a href="home.php?name=<?php echo $_GET['name']; ?>">Home</a></li>
							<li><a href="profile.php?name=<?php echo $_GET['name']; ?>">Profile</a></li>
							<li><a href="gerakan2.php?name=<?php echo $_GET['name']; ?>">Gerakan</a></li>
							<li><a href="gerakan.php?name=<?php echo $_GET['name']; ?>">Buat gerakan</a></li>
							<li><a href="logout.php">Keluar</a></li>
						</ul>
					</li>
				</ul>
            </div>
            
            <div id="tengah">
			<table>
			<tr>
				<th><div id="tengah-kiri">
					<div id="tkr-atas">
						<table>
						<tr>
							<th>
							<div id="tkra-foto">
								Made by:
								<br><br>
								<center><img src="" width=150>
								<br>
								<?php
									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "kppl_andy";
									$conn = mysqli_connect($servername, $username, $password, $dbname);
									$sql = "SELECT * FROM motion, profile WHERE M_ID = '".$_GET['id']."' AND motion.influenced = profile.username";
									$result = mysqli_query($conn, $sql);
						
									while($row = $result->fetch_assoc()){
										echo "{$row['influenced']}<br>";
										echo "follower : {$row['follower']} people";
									}
									mysqli_close($conn);
								?>
								</center>
							</div>
							</th>
							
							<th>
							<div id="tkra-info">
								<?php
									$jmlh = 0;
									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "kppl_andy";
									$conn = mysqli_connect($servername, $username, $password, $dbname);
									$sql = "SELECT * FROM motion WHERE M_ID = '".$_GET['id']."' ORDER BY follower DESC LIMIT 0,4";
									$result = mysqli_query($conn, $sql);
							
									while($row = $result->fetch_assoc()){
										echo 	"<center><h4>{$row['judul']}</h4>".
												"<table><tr>".
												"<th><form action='follow2.php?name=".$_GET['name']."&id={$row['M_ID']}' method='POST'><input type='submit' value='follow' style='margin: 5px;'></form></th>".
												"<th><form action='voluntee.php?name=".$_GET['name']."&id={$row['M_ID']}' method='POST'><input type='submit' value='voluntee' style='margin: 5px;'></form></th>".
												"<th><form action='like.php?name=".$_GET['name']."&id={$row['M_ID']}' method='POST'><input type='submit' value='like' style='margin: 5px;'></form></th>".
												"</tr></table>".
												"<br><br><br></center>".
												"Nama gerakan: {$row['judul']}<br>".
												"Fokus gerakan: {$row['fokus']}<br>".
												"Deskripsi gerakan: {$row['deskripsi']}<br>".
												"Syarat gerakan: {$row['syarat']}<br>".
												"Duedate: {$row['deadline']}";
									}
							
									mysqli_close($conn);
								?>
							</div>
							</th>
						<tr>
						</table>
					</div>
					<div id="tkr-bawah">
						Foto:<br>
						<img src="" height=120 width=200 style="margin: 10px; margin-left: 85px;"><img src="" height=120 width=200 style="margin: 10px;"><img src="" height=120 width=200 style="margin: 10px;">
						<br><br>
						<div style="border: 1px solid grey; height: 230px; padding: 15px;">
							Volunteer:
						</div>
					</div>
				</div></th>
				
				<th><div id="tengah-kanan">
					<div id="tkn-atas">
						<table>
						<tr>
						
						<?php
							$jmlh = 0;
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "kppl_andy";
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$sql = "SELECT * FROM motion WHERE M_ID = '".$_GET['id']."' ORDER BY follower DESC LIMIT 0,4";
							$result = mysqli_query($conn, $sql);
							
							while($row = $result->fetch_assoc()){
								echo 	"<th style='border: 1px solid #40c8fb; margin: 20px; padding: 10px; width: 150px;'><center>follower <br> {$row['follower']}</center></th>".
										"<th style='border: 1px solid #40c8fb; margin: 20px; padding: 10px; width: 150px;'><center>volunteer <br> {$row['volunteer']}</center></th>".
										"<th style='border: 1px solid #40c8fb; margin: 20px; padding: 10px; width: 150px;'><center>liked <br> {$row['liked']}</center></th>";
							}
							
							mysqli_close($conn);
						?>
						</tr>
						</table>
					</div>
					
					<div id="tkn-bawah">
						<h4 style="color: #40c8fb;">Kolom Komentar</h4>
						<table>
						<?php
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "kppl_andy";
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$sql = "SELECT * FROM komentar WHERE M_ID = '".$_GET['id']."' ORDER BY K_ID DESC LIMIT 0,3";
							$result = mysqli_query($conn, $sql);
							
							while($row = $result->fetch_assoc()){
								echo 	"<tr>".
										"<th style='padding-top: 15px; padding-bottom: 10px; border-top: 1px solid grey;'> <center><a href='profile.php?name={$row['username']}'><img src='' width=50> <br> {$row['username']} </a></center> </th>".
										"<th style='padding-left: 15px; border-top: 1px solid grey; width: 288px ;'> {$row['komentar']} <br> {$row['time']} </th>".
										"</tr>";
							}
							mysqli_close($conn);
						?>
						</table>
						<a href="#">lihat selanjutnya...</a>
					</div>
				</div></th>
			<tr>
			</table>
			</div>
                
            <div id="footer">
                copyright@2015 - Jurusan Sistem Informasi - ITS
            </div>
            
        </div>
    </body>
</html>
