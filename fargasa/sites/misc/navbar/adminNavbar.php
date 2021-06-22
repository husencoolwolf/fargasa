<?php
$page = $_SESSION['page'];
$subPage="";
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
            <li class='nav-item <?php if ($page=="adminMainMenu") echo "active"; ?>'>
              <a class="nav-link <?php if ($page=="adminMainMenu") echo "font-weight-bold"; ?>" href="/fargasa/">Dashboard</a>
            </li>
            
            <li class="nav-item <?php if ($page=="adminCekStok") echo "active"; ?> px-3">
                <a class="nav-link <?php if ($page=="adminCekStok") echo "font-weight-bold"; ?>" href="/fargasa/sites/admin/stock/adminLihatStock.php">Cek Stok</a>
            </li>
            
            <li class="nav-item px-3 dropdown <?php if ($page=="pembelian") echo "active"; ?>">
              <a class="nav-link dropdown-toggle <?php if ($page=="pembelian") echo "font-weight-bold"; ?>" href="#" id="navbarDropdownPembelian" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pembelian
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownPembelian">
                <a class="dropdown-item <?php if ($subPage=="adminLihatPembelian") echo "active"; ?>" href="/fargasa/sites/admin/pembelian/adminLihatPembelian.php">Lihat Pembelian</a>
                <a class="dropdown-item <?php if ($subPage=="adminInputPembelian") echo "active"; ?>" href="/fargasa/sites/admin/pembelian/adminInputPembelian.php">Input Pembelian</a>
                <a class="dropdown-item <?php if ($subPage=="adminLihatPenawaran") echo "active"; ?>" href="/fargasa/sites/admin/penawaran/adminLihatPenawaran.php">Lihat Penawaran</a>
              </div>
            </li>
            <li class="nav-item px-3 dropdown <?php if ($page=="penjualan") echo "active"; ?>">
              <a class="nav-link dropdown-toggle <?php if ($page=="penjualan") echo "font-weight-bold"; ?>" href="#" id="navbarDropdownPenjualan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Penjualan
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownPenjualan">
                  <a class="dropdown-item <?php if ($subPage=="adminLihatPenjualan") echo "active"; ?>" href="/fargasa/sites/admin/penjualan/adminLihatPenjualan.php">Lihat Penjualan</a>
                  <a class="dropdown-item <?php if ($subPage=="adminInputPenjualan") echo "active"; ?>" href="/fargasa/sites/admin/penjualan/adminInputPenjualan.php">Input Penjualan</a>
              </div>
            </li>
            <li class="nav-item px-3 dropdown <?php if ($page=="user") echo "active"; ?>">
              <a class="nav-link dropdown-toggle <?php if ($page=="user") echo "font-weight-bold"; ?>" href="#" id="navbarDropdownPenjualan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                User
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownPenjualan">
                  <a class="dropdown-item <?php if ($subPage=="adminLihatUser") echo "active"; ?>" href="/fargasa/sites/admin/user/adminLihatUser.php">Lihat User</a>
                  <a class="dropdown-item <?php if ($subPage=="adminInputUser") echo "active"; ?>" href="/fargasa/sites/admin/user/adminInputUser.php">Input User</a>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item px-3 dropdown">
              <a class="nav-link dropdown-toggle text-primary font-weight-bold" href="#" id="navbarDropdownAkun" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo strtoupper($_SESSION['nama']); ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownAkun">
                <a class="dropdown-item" href="/fargasa/sites/admin/profil/tampilProfile.php">Profil</a>
                <a class="dropdown-item text-danger" href="/fargasa/sesDes.php">Logout</a>
              </div>
            </li>
          </ul>
            
        </div>
  	</nav>