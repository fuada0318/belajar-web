<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Koneksi</title>
</head>
<body>
	<?php 
		$host="localhost";
		$user="root";
		$password="";
		$db="uts_pw";

		$kon=mysqli_connect($host,$user,$password,$db);
		if(!$kon){
			die("Koneksi Gagal:".mysqli_connect_error());
		}
	?>
</body>
</html>