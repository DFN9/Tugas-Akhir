<?php 

require 'functions.php'; 

$gambar = $_GET["gambar"];

if (file_exists($gambar)) {
	$mime_type = mime_content_type($gambar);

	header("Content-type: ". $mime_type);
	header("Content-Disposition: attachment; filename='$gambar'");

}else {
	echo "file not found!";
}

?>