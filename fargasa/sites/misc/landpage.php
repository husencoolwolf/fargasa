<?php

$data = mysqli_query($con, " SELECT * FROM pembelian");


?>
<!DOCTYPE html>
<html>

<head>
  <title>FARGASA MOBILINDO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <link rel="stylesheet" href="css/style.css"/> -->
  <link rel="icon" type="image/png" href="/fargasa/assets/Fargasa Logo Circle.png" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/fargasa/dist/css/bootstrap.css">
</head>

<body>
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
      <a class="navbar-brand d-none d-lg-block" href="#">
        <img class="" src="/fargasa/assets/Fargasa Logo Circle.png" alt="Dashboard" style="width: 80px">
      </a>
      <ul class="navbar-nav">
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
      <ul class="navbar-nav ml-auto">

        <li class="px-3">
          <a href="/fargasa/?action=login" class="btn btn-dark mr-sm-2 d-flex justify-content-center rounded-pill" role="button" aria-pressed="true">LOGIN</a>
        </li>

      </ul>
    </div>
  </nav>

  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="../public/img/aven.jpg" alt="First slide" style="height: 480px">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="../public/img/aven.jpg" alt="Second slide" style="height: 480px">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="../public/img/aven.jpg" alt="Third slide" style="height: 480px">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  </div>


  <div class="container-fluid">
    <a name="catalog">
      <h4 class="text-center font-weight-bold">Gallery Mobil</h4>
      <div class="container-fluid mt-4 row d-flex justify-content-center">
        <?php foreach ($data as $elements) : ?>
          <div class="row d-inline-flex mx-2">
            <div class="card m-2 " style="width: 18rem;">
              <img src="..." class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text d-none" id="id"><b><?= $elements["id"] ?></b></p>
                <h5 class="card-title" id="tipe"><b><?= $elements["tipe"] ?></b></h5>
                <p class="card-text" id="hrg_beli"><b><?= $elements["hrg_beli"] ?></b></p>
                <button class="btn btn-primary mx-auto d-flex justify-content-center detailbtn" data-toggle="modal" data-target="#detailmodal" data-id="<?= $elements["id"]; ?>">
                  Lihat detail
                </button>

              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
  </div>
  <!--container div  -->

  <!-- Modal -->
  <div class="modal fade" id="detailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tipe">Detail Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="data_barang">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <script src="/fargasa/dist/js/jquery-3.5.1.js"></script>
  <script src="/fargasa/dist/js/bootstrap.js"></script>
</body>
<script>
  if ($(window).width() < 768) {
    $('#brandMobile').show();
    $('#brandPC').hide();
  } else {
    $('#brandPC').show();
    $('#brandMobile').hide();
  }


  $(document).ready(function() {
    $('.detailbtn').on('click', function() {
      id = $(this).data('id');
      console.log(id);
      $('#detailmodal').modal('show');
      $.ajax({
        url: 'detail-barang.php',
        method: 'post',
        data: {
          id: id
        },
        success: function(data) {
          $('#data_barang').html(data);
          $('#detailmodal').modal("show");
        }
      });
    });
  })
</script>

</html>