<?php

session_start();

require 'functions.php';

//cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	//ambil username berdasarkan id
	$result = mysqli_query($conn,"SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	//cek cookie dan username
	if ($key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}

}


if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}

if (isset($_POST["login"])) {
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	//cek username
	if (mysqli_num_rows($result) === 1) {
		
		//cek password
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"])){
			//set session
			$_SESSION["login"] = true;

			//Cek remember me
			if (isset($_POST['remember'])) {
				
				//buat cookie
				
				setcookie('id', $row['id'], time()+60);
				setcookie('key',hash('sha256', $row['username']), time()+60);
			}

			header("Location: index.php");
			exit;
		}

	}

	$error = true;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Database Social Distancing</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util-login.css">
	<link rel="stylesheet" type="text/css" href="css/main-login.css">
<!--===============================================================================================-->
</head>
<body>

	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title">
						User Login
					</span>

					<?php if (isset($error)) : ?>
					<p style="color: red; font-style: italic;">username / password salah!</p>
					<?php endif; ?>

					<div class="wrap-input100 validate-input" data-validate = "username is required">
						<input class="input100" id="username" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" id="password" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<input type="checkbox" name="remember" id="remember">
						<label for="remember"></label>
						<span class="txt1">
							Remember me
						</span>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="registrasi.php">
							Daftar Akun (Registrasi)
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<<script src="js/main-login.js"></script>

</body>
</html>