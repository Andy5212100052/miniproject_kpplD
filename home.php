<html>
    <head>
        <title>RELAWAN ONLINE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/home.css">
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
							<li><a href="#">Home</a></li>
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
			<th>
				<div id="tengah-kiri">
					<center><a href="profile.php?name=<?php echo $_GET['name']; ?>"><img src="" width=125 style="margin-bottom: 6px;">
					<br>
					<?php echo $_GET['name']; ?>
					<br>
					</a>
					<?php
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "kppl_andy";
						$conn = mysqli_connect($servername, $username, $password, $dbname);
						$sql = "SELECT * FROM profile WHERE username = '".$_GET['name']."'";
						$result = mysqli_query($conn, $sql);
						
						while($row = $result->fetch_assoc()){
							echo "follower : {$row['follower']}";
						}
						mysqli_close($conn);
					?>
					</center>
					<br>
					<div id="p-motion">
						Popular Motion
						<br><br>
						<?php
							$jmlh = 0;
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "kppl_andy";
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$sql = "SELECT * FROM motion ORDER BY follower DESC LIMIT 0,3";
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
					
					<div id="n-motion">
						New Motion
						<br><br>
						<?php
							$jmlh = 0;
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "kppl_andy";
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$sql = "SELECT * FROM motion ORDER BY deadline DESC LIMIT 0,3";
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
				</div>
			</th>
			<th>
				<div id="tengah-mid">
				<form action="posting.php" method="POST">
					<h4>Beranda</h4>
					<textarea name="new" wrap="hard" placeholder="Update your motion activity..." style="width: 718px; height: 125px; resize: none; border: 1px solid red;"></textarea>
					<input type="text" value='<?php echo $_GET['name']; ?>' name="usernm" readonly  style="margin-left: 544px; margin-top: 4px; width: 120px;">
					<input type="submit" value="post">
				</form>
				
				<div id="tengah-mid-bawah">
					<table style="margin: 20px;">
						<?php
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "kppl_andy";
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$sql = "SELECT * FROM posting ORDER BY ID DESC LIMIT 0,4";
							$result = mysqli_query($conn, $sql);
							
							while($row = $result->fetch_assoc()){
								echo 	"<tr>".
										"<th style='padding-top: 15px; padding-bottom: 10px; border-top: 1px solid grey;'> <center><a href='profile.php?name={$row['username']}'><img src='' width=75> <br> {$row['username']} </a></center> </th>".
										"<th style='padding-left: 15px; border-top: 1px solid grey; width: 670px ;'> {$row['post']} <br> {$row['time']} </th>".
										"</tr>";
							}
							mysqli_close($conn);
						?>
					</table>
					<a href="" style="padding-left: 20px;">lihat selanjutnya...</a>
				</div>
				</div>
			</th>
			<th>
				<div id="tengah-kanan">
					<form style="margin-bottom: 142px;">
					<input type="text" name="search" placeholder="search..." style="margin: 5px; height: 30px;">
					<input type="submit" value="search">
					</form>
					
					<center><h5><strong>Most valueable volunteer</strong></h5></center>
					<table style="margin: 20px;">
						<?php
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "kppl_andy";
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$sql = "SELECT * FROM volunteer ORDER BY volunteering DESC LIMIT 0,3";
							$result = mysqli_query($conn, $sql);
							
							while($row = $result->fetch_assoc()){
								echo 	"<tr>".
										"<th style='padding-top: 15px; padding-bottom: 10px; border-top: 1px solid grey;'> <center><a href='profile.php?name={$row['username']}'><img src='' width=50> <br> {$row['username']} </a></center> </th>".
										"<th style='padding-left: 15px; border-top: 1px solid grey; width: 670px ;'> volunteering : {$row['volunteering']} <br> influencing : {$row['influencing']} </th>".
										"</tr>";
							}
							mysqli_close($conn);
						?>
					</table>
					
				</div>
			</th>
			</tr>
			</table>
			</div>
                
            <div id="footer">
                copyright@2015 - Jurusan Sistem Informasi - ITS
            </div>
            
        </div>
    </body>
</html>
