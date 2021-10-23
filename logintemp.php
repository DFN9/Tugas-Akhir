<?php 

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
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">

  <title>Login #3</title>
</head>
<body>


  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1" style="margin-top: 15%">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-10">
            <div class="form-block">
              <div class="text-center mb-5">
                <h3>Login to <strong>Colorlib</strong></h3>
                <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <table class="table table-striped">

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
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>



  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>