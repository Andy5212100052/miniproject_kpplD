<html>
    <head>
        <title>RELAWAN ONLINE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/register.css">
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
							<li><a href="#">Buat gerakan</a></li>
							<li><a href="logout.php">Keluar</a></li>
						</ul>
					</li>
				</ul>
                
            </div>
            
            <div id="tengah">
                <div id="register">
                    <h4>Buat Gerakan</h4>
                    <form name="register" method="POST" action="buat_gerakan.php">
						<table>
						<tr>
                        <td>influence </td> <td>:</td> <td> <input type="text" name="influence" value='<?php echo $_GET['name']; ?>' readonly style="margin: 5px;"></td>
						</tr>
						<tr>
                        <td>Judul </td> <td>:</td> <td> <input type="text" name="judul" style="margin: 5px;"></td>
						</tr>
						<tr>
                        <td>Fokus </td> <td>:</td> <td> <input type="text" name="fokus" value="Ex: Pendidikan" style="margin: 5px;"></td>
						</tr>
						<tr>
                        <td>Syarat </td> <td>:</td> <td> <input type="text" name="syarat" style="margin: 5px;"></td>
						</tr>
						<tr>
						<td>Deskripsi</td>
						<td>: </td>
						<td><textarea name="deskripsi" wrap="hard" style="width: 275px; height: 150px; resize: none; margin-left: 5px;"></textarea></td>
						</tr>
						<tr>
                        <td>Due Date </td> <td>:</td> <td> <select name="dd" style="margin-left: 5px;">
                                        <option value="tanggal">Tanggal</option>
                                        <option value="01">1</option>
                                        <option value="02">2</option>
                                        <option value="03">3</option>
                                        <option value="04">4</option>
                                        <option value="05">5</option>
                                        <option value="06">6</option>
                                        <option value="07">7</option>
                                        <option value="08">8</option>
                                        <option value="09">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        </select>
                                        
                                        <select name="mm">
                                        <option value="Bulan">Bulan</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">Nopember</option>
                                        <option value="12">Desember</option>
                                        </select>
										
                        <input type="text" name="tahun" value="Tahun (Ex: 1993)" style="width: 150px; height: 24px; margin: 5px;"></td>
						</tr>
						<tr>
                        <td>Upload foto gerakan </td><td>:</td><td><input type="file" name="datafile" style="margin: 5px; padding-left: 5px;"></td>
						</tr>
						<tr>
                        <br><br>
                        <td><input type="submit" value="Submit"></td>
						</tr>
						</table>
                    </form>
                </div>
                
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
								echo 	"<strong><a href='gerakan3.php?name=".$_GET['name']."&id={$row['M_ID']}'>{$row['judul']}</a></strong>".
										" <br> influenced : {$row['influenced']} ".
										" <br> deadline : {$row['deadline']}".
										" <form><input type='submit' value='follow'></form> <br>";
							}
							mysqli_close($conn);
						?>
						<a href="" style="padding-left: 2px;">lihat selanjutnya...</a>
                    </div>
                </div>
            </div>
                
            <div id="footer">
                copyright@2015 - Jurusan Sistem Informasi - ITS
            </div>
            
        </div>
    </body>
</html>
