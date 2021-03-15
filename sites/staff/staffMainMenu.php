<?php
include $_SERVER['DOCUMENT_ROOT'].'/ref/koneksi.php';
$conn = new createCon();
$con = $conn->connect();
session_start();
if(!isset($_SESSION['username']) && $_SESSION['privilege']<>'staff'){
    ?>
    <script language="JavaScript">
        alert('Session Telah Habis!!\nAnda harus login untuk mengakses halaman ini!!');
        document.location.href='/';
    </script>
    <?php
}else{
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="icon" type="image/png" href="/assets/Fargasa Logo Circle.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/dist/css/bootstrap.css">

    <title>Main Menu</title>
  </head>
  <body>
    
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">
          <img class="" src="/assets/Fargasa Logo Circle.png" alt="Dashboard">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link font-weight-bold" href="/">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link" href="#">Cek Stok</a>
            </li>
            
            <li class="nav-item px-3 dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPembelian" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pembelian
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownPembelian">
                <a class="dropdown-item" href="/sites/staff/pembelian/staffLihatPembelian.php">Lihat Pembelian</a>
                <a class="dropdown-item" href="/sites/staff/pembelian/staffInputPembelian.php">Input Pembelian</a>
              </div>
            </li>
            <li class="nav-item px-3 dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPenjualan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Penjualan
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownPenjualan">
                <a class="dropdown-item" href="#">Lihat Penjualan</a>
                <a class="dropdown-item" href="#">Input Penjualan</a>
              </div>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link" href="#">Laporan</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item px-3 dropdown">
              <a class="nav-link dropdown-toggle text-primary font-weight-bold" href="#" id="navbarDropdownAkun" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo strtoupper($_SESSION['nama']); ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownAkun">
                <a class="dropdown-item" href="#">Profil</a>
                <a class="dropdown-item text-danger" href="/sesDes.php">Logout</a>
              </div>
            </li>
          </ul>
            
        </div>
      </nav>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="/dist/js/jquery-3.5.1.js"></script>
    <script src="/dist/js/bootstrap.js"></script>

  </body>
</html>
<?php
}
?>