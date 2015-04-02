<html>
    <head>
        <title>RELAWAN ONLINE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/profile.css">
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
							<li><a href="#">Profile</a></li>
							<li><a href="gerakan2.php?name=<?php echo $_GET['name']; ?>">Gerakan</a></li>
							<li><a href="gerakan.php?name=<?php echo $_GET['name']; ?>">Buat gerakan</a></li>
							<li><a href="logout.php">Keluar</a></li>
						</ul>
					</li>
				</ul>
            </div>
            
            <div id="tengah">
				<div id="tengah-atas">
				<table><tr>
					<th><div id="ta-foto">
						<img src="" width=125 style="margin-bottom: 6px;">
						
						<form action="follow.php?name=<?php echo $_GET['name']; ?>" method="POST">
							<input type="submit" value="follow">
						</form>
						
					</div></th>
					<th><div id="ta-nama">
						Profile <a href="register2.php?name=<?php echo $_GET['name']; ?>">Edit</a><br>
						<?php echo " - ".$_GET['name']; ?> <br>
						<br>
						Tertarik dengan:<br>
						<?php
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "kppl_andy";
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$sql = "SELECT * FROM profile WHERE username = '".$_GET['name']."'";
							$result = mysqli_query($conn, $sql);
						
							while($row = $result->fetch_assoc()){
								echo "- {$row['fokus']}";
							}
							mysqli_close($conn);
						?>
					</div></th>
					<th><div id="ta-info">
						<table>
						<tr>
						<?php
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "kppl_andy";
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$sql = "SELECT * FROM profile WHERE username = '".$_GET['name']."'";
							$result = mysqli_query($conn, $sql);
						
							while($row = $result->fetch_assoc()){
								echo 	"<th style='border: 1px solid #40c8fb; margin: 20px; padding: 10px; width: 150px;'><center>follower <br> {$row['follower']}</center></th>".
										"<th style='border: 1px solid #40c8fb; margin: 20px; padding: 10px; width: 150px;'><center>following <br> {$row['following']}</center></th>".
										"<th style='border: 1px solid #40c8fb; margin: 20px; padding: 10px; width: 150px;'><center>volunteer in <br> {$row['volunteer_in']}</center></th>".
										"<th style='border: 1px solid #40c8fb; margin: 20px; padding: 10px; width: 150px;'><center>influence in <br> {$row['influence_in']}</center></th>";
							}
							mysqli_close($conn);
						?>
						</tr>
						</table>
					</div></th>
				</table></tr>
				</div>
				<div id="tengah-bawah">
				<table><tr>
					<th><div id="tb-kiri">
						Foto:<br>
						<img src="" height=120 width=200 style="margin: 10px; margin-left: 30px;"><img src="" height=120 width=200 style="margin: 10px;"><img src="" height=120 width=200 style="margin: 10px;">
						<br><br>
						<form action="posting2.php" method="POST">
							<h4>Beranda</h4>
							<textarea name="new" wrap="hard" placeholder="Update your motion activity..." style="width: 718px; height: 125px; resize: none; border: 1px solid red;"></textarea>
							<input type="text" value='<?php echo $_GET['name']; ?>' name="usernm" readonly  style="margin-left: 544px; margin-top: 4px; width: 120px;">
							<input type="submit" value="post">
						</form>
						
							<table style="margin-top: 20px; margin-bottom: 20px;">
							<?php
								$servername = "localhost";
								$username = "root";
								$password = "";
								$dbname = "kppl_andy";
								$conn = mysqli_connect($servername, $username, $password, $dbname);
								$sql = "SELECT * FROM posting WHERE username = '".$_GET['name']."' ORDER BY ID DESC LIMIT 0,2";
								$result = mysqli_query($conn, $sql);
							
								while($row = $result->fetch_assoc()){
									echo 	"<tr>".
											"<th style='padding-top: 15px; padding-bottom: 10px; border-top: 1px solid grey;'> <center><a href='profile.php?name={$row['username']}'><img src='' width=75> <br> {$row['username']} </a></center> </th>".
											"<th style='padding-left: 15px; border-top: 1px solid grey; width: 644px ;'> {$row['post']} <br> {$row['time']} </th>".
											"</tr>";
								}
								mysqli_close($conn);
							?>
						</table>
						<a href="">lihat selanjutnya...</a>
					
					</div></th>
					
					<th><div id="tb-kanan">
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
					</div></th>
				</table></tr>
				</div>
			</div>
                
            <div id="footer">
                copyright@2015 - Jurusan Sistem Informasi - ITS
            </div>
            
        </div>
    </body>
</html>
