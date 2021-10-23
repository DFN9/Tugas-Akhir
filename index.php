<?php 

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
}

require 'functions.php';
$violation = query("SELECT * FROM violation");

//tombol cari diklik
if (isset($_POST["cari"])){
	$mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Database Pelanggaran Social Distancing</title>
	<link rel="stylesheet" type="text/css" href="preview.css">

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
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">

</head>
<body id="page-top">
	<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #36304a;" id="mainNav">
  	<div class="container">
    <a class="navbar-brand" href="#page-top" style="color: white;">DATABASE PELANGGARAN SOCIAL DISTANCING</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        	<a class="btn btn-primary" href="logout.php" role="button" style="background-color: red;" onclick="return confirm('anda yakin ingin logout?')">Logout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
    </div>
  	</div>
	</nav>

<!--	<a href="logout.php">Logout</a> -->
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<table style="margin-top: 10%">
						<thead>
							<tr class="table100-head">
								<th style="text-align: center;">No.</th>
								<th style="text-align: center;">Aksi</th>
								<th style="text-align: center;">Gambar</th>
								<th style="text-align: center;">Waktu</th>
							</tr>
<?php $i=1; ?>
<?php foreach($violation as $row) : ?>
						</thead>
						<tbody>
								<tr>
									<td style="text-align: center;"><b><?= $i; ?></b></td>
									<td width="50"><a href="<?php echo 'social-distancing-detector/'.$row["gambar"]; ?>" class="thumbs" onclick="return false">preview</a><br><br><a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('yakin?')">hapus</a></td>
									<td width="500" height="300"><img src="<?php echo 'social-distancing-detector/'.$row["gambar"]; ?>" width="100%"></td>
									<td style="text-align: center;"><?php echo $row["waktu"]; ?></td>
								</tr>
<?php $i++; ?>
<?php endforeach; ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<div id="preview"></div>
<script type="text/javascript" src="preview.js"></script>

	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script type="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>

</body>
</html>