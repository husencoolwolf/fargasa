<?php
include $_SERVER['DOCUMENT_ROOT'] . '/fargasa/ref/koneksi.php';
date_default_timezone_set("Asia/Jakarta");
$conn = new createCon();
$con = $conn->connect();
$dataStok = mysqli_query($con, "SELECT count(id_stok) as stock FROM stok");
$dataPembelian = mysqli_query($con, "SELECT id_pembelian FROM pembelian where month(tgl_beli)=".date('m'));
$dataPenjualan = mysqli_query($con, "SELECT id_penjualan FROM penjualan where month(tgl_jual)=".date('m'));
$dataProfit = mysqli_query($con, "SELECT(SELECT (SUM(penjualan.hrg_jual)-SUM(penjualan.fee_mediator)-SUM(penjualan.fee_sales)+SUM(penjualan.refund) - SUM(pembelian.hrg_beli)-SUM(pembelian.fee_mediator)-SUM(pembelian.pajak)-SUM(pembelian.rekondisi)) FROM penjualan INNER JOIN pembelian ON penjualan.id_pembelian=pembelian.id_pembelian where month(penjualan.tgl_jual)='".date('m')."') as profit");
session_start();
$_SESSION['page'] = "adminMainMenu";
if (!isset($_SESSION['username']) && $_SESSION['privilege'] <> 'admin') {
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
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/fargasa/sites/misc/navbar/adminNavbar.php"; ?>

    <div class="d-flex justify-content-center">
      <div class="jumbotron m-5 text-center  " style="width: 60%;">
        <h1 class="display-5">Selamat Datang <?= $_SESSION['nama'] ?></h1>
        <p class="lead "><?= date('l, d-m-Y'); ?></p>
        <div class="digital-clock"> 00:00:00</div>

      </div>
    </div>

    <div class="w-100 bg-light">
        <div class="container">
        <div class="row">
            <div class="col-md">
                <!--Stok Mobil-->
                <div class="card m-5 text-center mx-auto w-100" style="width: 18rem;  ">
                    <div class="card-body ">
                      <h5 class="card-title mt-4">Stok Mobil</h5>
                      <h2 class="card-text"> <?php
                                              while ($row = mysqli_fetch_array($dataStok)) {
                                                echo ($row[0]);
                                              }
                                              ?></h2>
                      <a href="/fargasa/sites/admin/stock/adminLihatStock.php" class=" stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <!--Transaksi Pembelian-->
            <div class="col-md">
                <div class="card m-5 text-center mx-auto w-100" style="width: 18rem;  ">
                    <div class="card-body ">
                      <h5 class="card-title mt-4">Transaksi Pembelian Bulan Ini</h5>
                      <h2 class="card-text"> <?= mysqli_num_rows($dataPembelian); ?></h2>
                      <a href="/fargasa/sites/admin/pembelian/adminLihatPembelian.php" class=" stretched-link"></a>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card m-5 text-center mx-auto w-100" style="width: 18rem;  ">
                    <div class="card-body ">
                      <h5 class="card-title mt-4">Transaksi Penjualan Bulan Ini</h5>
                      <h2 class="card-text"> <?= mysqli_num_rows($dataPenjualan); ?></h2>
                      <a href="/fargasa/sites/admin/penjualan/adminLihatPenjualan.php" class=" stretched-link"></a>
                    </div>
                </div>
            </div>
            
            <div class="col-md">
                <div class="card m-5 text-center mx-auto w-100" style="width: 18rem;  ">
                    <div class="card-body ">
                      <h5 class="card-title mt-4">Profit Penjualan Bulan Ini</h5>
                      <h2 class="card-text"> <?php $row = mysqli_fetch_array($dataProfit); echo $conn->intToRupiah($row['profit']); ?></h2>
                      <a href="/fargasa/sites/admin/penjualan/adminLihatPenjualan.php" class=" stretched-link"></a>
                    </div>
                </div>
            </div>

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