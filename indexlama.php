<?php 

require 'functions.php';
$violation = query("SELECT * FROM violation");

//tombol cari diklik
if (isset($_POST["cari"])){
	$mahasiswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Database Pelanggaran Social Distancing</title>
	<link rel="stylesheet" type="text/css" href="preview.css">
</head>
<body>

<h1 style="text-align: center;">Database Pelanggaran Social Distancing</h1>

<table style="border:1px solid black;margin-left:auto;margin-right:auto;" border="1" cellpadding="10" cellspacing="0">

<tr>
	<th>No.</th>
	<th>Aksi</th>
	<th>Gambar</th>
	<th>Waktu</th>
</tr>	

<?php $i=1; ?>
<?php foreach($violation as $row) : ?>

<tr>
	<td><?= $i; ?></td>
	<td width="50">
		<a href="<?php echo 'social-distancing-detector/'.$row["gambar"]; ?>" class="thumbs" onclick="return false">preview</a><br><br>
		<a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('yakin?')">hapus</a>
	</td>
	<td width="500" height="300"><img src="<?php echo 'social-distancing-detector/'.$row["gambar"]; ?>" width="100%"></td>
	<td><?php echo $row["waktu"]; ?></td>

<?php $i++; ?>
<?php endforeach; ?>

</tr>

</table>
<div id="preview"></div>
<script type="text/javascript" src="preview.js"></script>
</body>
</html>