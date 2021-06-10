<?php
$page = $_SESSION['page'];
$subPage = "";
if (isset($_SESSION['subPage'])) {
  $subPage = $_SESSION['subPage'];
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/fargasa/">
    <img class="" src="/fargasa/assets/Fargasa Logo Circle.png" alt="Dashboard">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav mr-auto">
      <li class='nav-item <?php if ($page == "mainmenu") echo "active"; ?>'>
        <a class="nav-link <?php if ($page == "mainmenu") echo "font-weight-bold"; ?>" href="/fargasa/">Dashboard</a>
      </li>
      <li class="nav-item <?php if ($page == "pembelian") echo "active"; ?> px-3">
        <a class="nav-link <?php if ($page == "pembelian") echo "font-weight-bold"; ?>" href="/fargasa/sites/owner/pembelian/ownerLihatPembelian.php">Pembelian</a>
      </li>
      <li class="nav-item <?php if ($page == "penjualan") echo "active"; ?> px-3">
        <a class="nav-link <?php if ($page == "penjualan") echo "font-weight-bold"; ?>" href="/fargasa/sites/owner/penjualan/ownerLihatPenjualan.php">Penjualan</a>
      </li>
      <li class='nav-item <?php if ($page == "ownerLihatLaporan") echo "active"; ?>'>
        <a class="nav-link <?php if ($page == "ownerLihatLaporan") echo "font-weight-bold"; ?>" href="/fargasa/sites/owner/laporan/ownerLihatLaporan.php">Laporan</a>
      </li>
    </ul>

    <ul class="navbar-nav">
      <li class="nav-item px-3 dropdown">
        <a class="nav-link dropdown-toggle text-primary font-weight-bold" href="#" id="navbarDropdownAkun" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo strtoupper($_SESSION['nama']); ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownAkun">

          <a class="dropdown-item text-danger" href="/fargasa/sesDes.php">Logout</a>
        </div>
      </li>
    </ul>

  </div>
</nav>