<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="kotak">
	<h2 align="center">Login Admin Laundry</h2>
	<br/>
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Login gagal! username dan password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda telah berhasil logout";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus login untuk mengakses halaman admin";
		}
	}
	?>
	<br/>
	<br/>
	
		<form method="post" action="cek_login.php">
			<table>
				<tr>
					<td>Username</td>
					<td>:</td>
					<td><input type="text" name="username" placeholder="Masukkan username"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input type="password" name="password" placeholder="Masukkan password"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" value="LOGIN"></td>
				</tr>
			</table>			
		</form>
	</div>
</body>
</html>