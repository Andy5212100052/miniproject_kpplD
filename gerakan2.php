<html>
    <head>
        <title>RELAWAN ONLINE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/gerakan2.css">
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
							<li><a href="#">Gerakan</a></li>
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
					<table>
					<tr>
					<th>
						Gerakan anda
						<br>
					<div id="y-motion">
						<?php
							$jmlh = 0;
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "kppl_andy";
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$sql = "SELECT * FROM motion WHERE influenced = '".$_GET['name']."' ORDER BY follower DESC LIMIT 0,5";
							$result = mysqli_query($conn, $sql);
							
							while($row = $result->fetch_assoc()){
								echo 	"<strong><a href='gerakan3.php?name=".$_GET['name']."&id={$row['M_ID']}'>{$row['judul']}</a></strong>".
										" <br> follower : {$row['follower']} ".
										" <br> volunteer : {$row['volunteer']} ".
										" <br> liked : {$row['liked']} ".
										" <br> deadline : {$row['deadline']}<br><br>";
							}
							mysqli_close($conn);
						?>
						<br>
						<a href="" style="padding-left: 2px;">lihat selanjutnya...</a><br>
						<a href="gerakan4.php?name=<?php echo $_GET['name']; ?>" style="padding-left: 2px;">lihat semua</a>
					</div>
					</th>
					
					<th>
					Popular Motion
						<br>
					<div id="p-motion">
						<?php
							$jmlh = 0;
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "kppl_andy";
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$sql = "SELECT * FROM motion ORDER BY follower DESC LIMIT 0,4";
							$result = mysqli_query($conn, $sql);
							
							while($row = $result->fetch_assoc()){
								echo 	"<strong><a href='gerakan3.php?name=".$_GET['name']."&id={$row['M_ID']}'>{$row['judul']}</a></strong>".
										" <br> follower : {$row['follower']} <br><br>";
							}
							mysqli_close($conn);
						?>
						<br>
						<a href="" style="padding-left: 2px;">lihat selanjutnya...</a>
					</div>

						New Motion
						<br>					
					<div id="n-motion">

						<?php
							$jmlh = 0;
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "kppl_andy";
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$sql = "SELECT * FROM motion ORDER BY deadline DESC LIMIT 0,4";
							$result = mysqli_query($conn, $sql);
							
							while($row = $result->fetch_assoc()){
								echo 	"<strong><a href='gerakan3.php?name=".$_GET['name']."&id={$row['M_ID']}'>{$row['judul']}</a></strong>".
										" <br> follower : {$row['follower']}<br><br>";
							}
							mysqli_close($conn);
						?>
						<br>
						<a href="" style="padding-left: 2px;">lihat selanjutnya...</a>
					</div>
					</th></tr>
					</table>
				</div></th>
				
				<th><div id="tengah-kanan">
					<div id="tkn-atas">
						<table>
						<tr>
						<?php
						echo 	"<th style='border: 1px solid #40c8fb; margin: 20px; padding: 10px; width: 150px;'><center>follower <br> 0</center></th>".
								"<th style='border: 1px solid #40c8fb; margin: 20px; padding: 10px; width: 150px;'><center>volunteer <br> 0</center></th>".
								"<th style='border: 1px solid #40c8fb; margin: 20px; padding: 10px; width: 150px;'><center>liked <br>0 </center></th>";
						?>
						</tr>
						</table>
					</div>
					
					<div id="tkn-bawah">
						<h4 style="color: #40c8fb;">Kolom Komentar</h4>
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
