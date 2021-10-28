<?php 
require 'functions.php';

if (isset($_POST["register"])) {
	if (registrasi($_POST)) {
		echo "<script> 
				alert('user baru berhasil ditambahkan');
			</script>";
	} else {
		echo mysqli_error($conn);
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Registrasi Database Social Distancing</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/nunito-font.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/styleregis.css"/>
</head>
<body class="form-v9">
	<div class="page-content" style="background: -webkit-linear-gradient(45deg, #4158d0, #c850c0);">
		<div class="form-v9-content" style="border-style: solid; background-image: url('images/kamerayya3_2.jpg')">
			<form class="form-detail" action="" method="post">
				<h2>Form Registrasi</h2>
				<div class="form-row-total-username">
					<div class="form-row-email">
						<input type="text" name="username" id="username" class="input-text" placeholder="masukkan username..." required="">
					</div>
				</div>
				<div class="form-row-total-password">
					<div class="form-row-password">
						<input type="password" name="password" id="password" class="input-text" placeholder="masukkan password..." required>
					</div>
					<div class="form-row-password2">
						<input type="password" name="password2" id="password2" class="input-text" placeholder="masukkan konfirmasi password..." required>
					</div>
				</div>
				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Register">
				</div>
				<br><a href="login.php" style="color: silver; padding-right: 50%; padding-left: 50%;">Login</a>
			</form>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>