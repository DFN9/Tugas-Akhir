<?php

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$conn = mysqli_connect("localhost", "jage6548", "JNwGZqTFkrSH31", "jage6548_social_distance_db");
	$source_filename = $_FILES['image']['tmp_name'];
	$destination_filename = 'database-pelanggaran/'.$_FILES['image']['name'];
	$number_of_violate = $_POST['num'];

	if(move_uploaded_file($source_filename, 'social-distancing-detector/'.$destination_filename)) {
		$sql = "INSERT INTO violation (gambar, pelanggar) VALUES ('$destination_filename','$number_of_violate')";
		mysqli_query($conn, $sql);
		echo "Success";
	} else {
		echo "Fail";
	}
}
?>