<?php 
session_start();

require 'config.php';

if( isset($_POST["login"]) ){

	$nip = $_POST["nip"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE nip = '$nip'");

	if( mysqli_num_rows($result) === 1){

		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			$_SESSION["login"] = true;

			header("Location: index.php");
			exit;
		}
	}
	$error = true;


}



 ?>






<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
	<title>Login</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/layout.css">
</head>
<body>	
		<div class="container">
		
		<div class="form-bg">
			<form action="" method="post">
				<h2>Silahkan Login..</h2>
				<?php if( isset($error)) : ?>
						<p style="color: red; font-style: italic">Nip / Password Salah</p>
					<?php endif; ?>

				<p><input type="text" onkeypress="return onlyNumberKey(event)" minlength="18" maxlength="19" class="form-control" placeholder="NIP" name ="nip" id="nip">
				<p><input type="password" minlength="8" class="form-control" placeholder="Password" name ="password" id="password">
				<button type="submit" name="login"></button>
			<form>
		</div>
		</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
	<script src="js/app.js"></script>

</body>
</html>