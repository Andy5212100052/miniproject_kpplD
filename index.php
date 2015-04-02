<html>
    <head>
        <title>RELAWAN ONLINE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/awal.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <div>
            
            <div id="atas">
                <center><strong>RELAWAN ONLINE</strong></center>
            </div>
            
            <div id="tengah">
                <div id="trending">
                    <div id="trending-title">
                        Trending Motion
                    </div>

                    <div id="trending-content">
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
								echo 	"<strong>{$row['judul']}</strong>".
										" <br> influenced : {$row['influenced']} ".
										" <br> deadline : {$row['deadline']}".
										" <form><input type='submit' value='follow'></form> <br>";
							}
							mysqli_close($conn);
						?>
						<a href="" style="padding-left: 2px;">lihat selanjutnya...</a>
                    </div>
                </div>

                <div id="login">
                    <div id="login-form">
                        <strong>Login</strong>
                        <form name="login" action="validate.php" method="POST">
                            <br>
                            Username:<br>
                            <input type="text" name="username" id='username'><br>
                            <br>
                            Password:<br>
                            <input type="password" name="password" id='password'><br>
                            <br>
                            <a href="">forget password?</a><br>
                            <br>
                            <br>
                            <input type="submit" name="Login" value="Login">
                            <a href="register.php">Sign Up</a><br>
                        </form>
                    </div>
                </div>
            </div>
                
            <div id="footer">
                copyright@2015 - Jurusan Sistem Informasi - ITS
            </div>
            
        </div>
    </body>
</html>
