<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
date_default_timezone_set("Asia/Jakarta");
$conn = new createCon();
$con = $conn->connect();
$dataStok = mysqli_query($con, "SELECT * FROM stok");
$dataPembelian = mysqli_query($con, "SELECT COUNT(*) FROM pembelian");
$dataPenjualan = mysqli_query($con, "SELECT COUNT(*) FROM penjualan");
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
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/fargasa/sites/misc/navbar/staffNavbar.php"; ?>

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
          <h2 class="card-text"> <?= mysqli_num_rows($dataStok); ?></h2>
          <a href="/fargasa/sites/staff/stock/staffLihatStock.php" class="stretched-link cad"></a>
        </div>
      </div>

      <div class="card m-5 text-center d-flex  " style="width: 18rem;  ">
        <div class="card-body ">
          <h5 class="card-title mt-4">Total Pembelian </h5>
          <h2 class="card-text"> <?= mysqli_num_rows($dataPembelian); ?></h2>
          <a href="/fargasa/sites/staff/pembelian/staffLihatPembelian.php" class=" stretched-link"></a>
        </div>
      </div>

      <div class="card m-5 text-center d-flex  " style="width: 18rem;  ">
        <div class="card-body ">
          <h5 class="card-title mt-4">Total Penjualan</h5>
          <h2 class="card-text"> <?= mysqli_num_rows($dataPenjualan); ?></h2>
          <a href="/fargasa/sites/staff/penjualan/staffLihatPenjualan.php" class=" stretched-link"></a>
        </div>
      </div>
    </div>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="/fargasa/dist/js/jquery-3.5.1.js"></script>
    <script src="/fargasa/dist/js/bootstrap.js"></script>

  </body>

  <script>
    //menampilkan live jam
    $(document).ready(function() {
      clockUpdate();
      setInterval(clockUpdate, 1000);
    })

    function clockUpdate() {
      var date = new Date();


      function addZero(x) {
        if (x < 10) {
          return x = '0' + x;
        } else {
          return x;
        }
      }

      function twelveHour(x) {
        if (x > 12) {
          return x = x - 12;
        } else if (x == 0) {
          return x = 12;
        } else {
          return x;
        }
      }

      var h = addZero(twelveHour(date.getHours()));
      var m = addZero(date.getMinutes());
      var s = addZero(date.getSeconds());
      var ampm = h <= 12 ? 'PM' : 'AM';
      h = h % 12;
      $('.digital-clock').text(h + ':' + m + ':' + s + ' ' + ampm)
    }
  </script>

  </html>
<?php
}


?>