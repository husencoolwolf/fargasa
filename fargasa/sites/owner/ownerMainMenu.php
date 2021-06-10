<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
date_default_timezone_set("Asia/Jakarta");
$conn = new createCon();
$con = $conn->connect();
$dataStok = mysqli_query($con, "SELECT count(id_stok) as stock FROM stok");
$dataPembelian = mysqli_query($con, "SELECT * FROM pembelian");
$dataPenjualan = mysqli_query($con, "SELECT * FROM penjualan");
session_start();
$_SESSION['page'] = "staffMainMenu";
if (!isset($_SESSION['username']) && $_SESSION['privilege'] <> 'staff') {
?>
  <script language="JavaScript">
    alert('Session Telah Habis!!\nAnda harus login untuk mengakses halaman ini!!');
    document.location.href = '/fargasa/index.php?action=login';
  </script>

<?php
} else {
?>
  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" type="image/png" href="/fargasa/assets/Fargasa Logo Circle.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/fargasa/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/fargasa/dist/css/hovercard-dashboard.css">
    <title>Main Menu</title>
  </head>

  <body>
    <!-- navbar -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/fargasa/sites/misc/navbar/ownerNavbar.php"; ?>

    <div class="d-flex justify-content-center">
      <div class="jumbotron m-5 text-center  " style="width: 60%;">
        <h1 class="display-5">Selamat Datang <?= $_SESSION['nama'] ?></h1>
        <p class="lead "><?= date('l, d-m-Y'); ?></p>
        <div class="digital-clock"> 00:00:00</div>

      </div>
    </div>

    <div class="data d-flex justify-content-center m-5">
      <div class="card m-5 text-center d-flex  " style="width: 18rem;  ">
        <div class="card-body ">
          <h5 class="card-title mt-4">Stok Mobil</h5>
          <h2 class="card-text"> <?php
                                  while ($row = mysqli_fetch_array($dataStok)) {
                                    echo ($row[0]);
                                  }
                                  ?></h2>

        </div>
      </div>

      <div class="card m-5 text-center d-flex  " style="width: 18rem;  ">
        <div class="card-body ">
          <h5 class="card-title mt-4">Total Pembelian </h5>
          <h2 class="card-text"> <?= mysqli_num_rows($dataPembelian); ?></h2>
          <a href="/fargasa/sites/owner/pembelian/ownerLihatPembelian.php" class=" stretched-link"></a>
        </div>
      </div>

      <div class="card m-5 text-center d-flex  " style="width: 18rem;  ">
        <div class="card-body ">
          <h5 class="card-title mt-4">Total Penjualan</h5>
          <h2 class="card-text"> <?= mysqli_num_rows($dataPenjualan); ?></h2>
          <a href="/fargasa/sites/owner/penjualan/ownerLihatPenjualan.php" class=" stretched-link"></a>
        </div>
      </div>
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="/fargasa/dist/js/jquery-3.5.1.js"></script>
    <script src="/fargasa/dist/js/bootstrap.js"></script>

  </body>
  <script src="/fargasa/ref/jam-digital.js"></script>
  <script>
    //menampilkan live jam
    $(document).ready(function() {
      clockUpdate();
      setInterval(clockUpdate, 1000);
    })
  </script>

  </html>
<?php
}


?>