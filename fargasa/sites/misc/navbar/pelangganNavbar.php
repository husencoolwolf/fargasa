<?php
$page = $_SESSION['page'];
$subPage="";
if (isset($_SESSION['subPage'])) {
  $subPage = $_SESSION['subPage'];
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <!--  Show this only on mobile to medium screens  -->
    <a class="navbar-brand d-lg-none" href="#">
      <img class="" src="/fargasa/assets/Fargasa Logo Circle.png" alt="Dashboard" style="width: 80px">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!--  Use flexbox utility classes to change how the child elements are justified  -->
    <div class="collapse navbar-collapse " id="navbarToggle">

      <!--   Show this only lg screens and up   -->
      <ul class="navbar-nav">
        <a class="navbar-brand d-none d-lg-block" href="/fargasa/">
          <img class="" src="/fargasa/assets/Fargasa Logo Circle.png" alt="Dashboard" style="width: 80px">
        </a>
      </ul>
      <ul class="navbar-nav mx-auto">
        <li class="nav-item px-3 ml-0">
          <a class="nav-link active" href="#catalog">CATALOG <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item px-3 ml-0">
          <a class="nav-link" href="#">PROMO</a>
        </li>
        <li class="nav-item px-3 ml-0">
          <a class="nav-link" href="#profil">PROFIL</a>
        </li>
        <li class="nav-item px-3 ml-0">
          <a class="nav-link" href="#contact">HUBUNGI KAMI</a>
        </li>
      </ul>
    


      <ul class="navbar-nav"> <!-- Profile Button -->
          <li>
            <button class="btn btn-dark">
              <i class="fa fa-bell" aria-hidden="true"></i>
            </button>
          </li>
          <li class="nav-item px-3 dropdown">
            <a class="nav-link dropdown-toggle text-primary font-weight-bold" href="#" id="navbarDropdownAkun" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo strtoupper($_SESSION['nama']); ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownAkun">
              <a class="dropdown-item" href="/fargasa/sites/pelanggan/profil/tampilProfile.php">Profil</a>
              <a class="dropdown-item text-danger" href="/fargasa/sesDes.php">Logout</a>
            </div>
          </li>
      </ul>
    </div>
  </nav>