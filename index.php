<?php 
session_start();

if( !isset($_SESSION["login"]) ){
	header("Location: login.php");
	exit;
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Beranda</title>
	<a href="logout.php">Logout</a>	
</head>
<body>
<h2>Beranda</h2>
</body>
</html>