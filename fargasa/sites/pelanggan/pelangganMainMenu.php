<!-- <script>


?> -->


<?php
include $_SERVER['DOCUMENT_ROOT'].'/fargasa/ref/koneksi.php';

$conn = new createCon();
$con = $conn->connect();
session_start();
$_SESSION['page'] = "pelangganMainMenu";
if(!isset($_SESSION['username']) && $_SESSION['pelanggan']<>'staff'){
    ?>
    <script language="JavaScript">
        alert('Session Telah Habis!!\nAnda harus login untuk mengakses halaman ini!!');
        document.location.href='/fargasa/index.php?action=login';
    </script>
    <?php
}else{
    $data = mysqli_query($con, " SELECT * FROM stok");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="icon" type="image/png" href="/fargasa/assets/Fargasa Logo Circle.png" />
    <link rel="stylesheet" href="/fargasa/dist/font-awesome-4.7.0/css/font-awesome.css"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/fargasa/dist/css/bootstrap.css">

    <title>Main Menu</title>
  </head>
  <body>
    

    <!-- navbar -->
    <?php include_once $_SERVER['DOCUMENT_ROOT']."/fargasa/sites/misc/navbar/pelangganNavbar.php";?>

    <div class="toast" id="statInputMsg" data-delay="10000">
            
    </div>
    
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100 img-fluid" src="/fargasa/assets/imk/fargasa1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/fargasa/assets/imk/bg.jpeg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/fargasa/assets/imk/bg.jpeg" alt="Third slide">
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

      <!--   catalog   -->
      <div class="container-fluid" style="margin-top:50px;">
        <a name="catalog">
          <h4 class="text-center " style="font-size:40px; color:gray; font-family: Glegoo,serif;">Gallery Mobil</h4>
          <div class="container-fluid mt-4 row d-flex justify-content-center">
            <?php foreach ($data as $elements) : ?>
              <div class="row d-inline-flex mx-2">
                <div class="card m-2 " style="width: 18rem;">
                  <img class="img-fluid" src="/fargasa/assets/gambar/<?= $elements["gambar"] ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="card-text d-none" id="id"><b><?= $elements["id_pembelian"] ?></b></p>
                    <h5 class="card-title" id="tipe"><b><?= $elements["tipe"] ?></b></h5>
                    <p class="card-text" id="hrg_beli"><b><?= $conn->intToRupiah($elements["hrg_jual"]) ?></b></p>
                    <button class="btn btn-primary mx-auto d-flex justify-content-center detailbtn" data-toggle="modal" data-target="#detailmodal" data-id="<?= $elements["id_pembelian"]; ?>">
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
            <div class="modal-body" id="data_barang" data-id="">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" id="bookBtn" class="btn btn-primary" data-dismiss="modal">Booking Now</button>
            </div>
          </div>
        </div>
      </div>

      <!--Profil  -->
      <div class="container mt-5 profil" style=" max-width: 100%;">
        <a name="profil">
          <h4 style="text-align: center; font-family: Glegoo,serif; font-size:40px; color:gray;">Why Choose Us</h4>
          <div class="container-fluid text-center">
            <p>CV. Fargasa Pratama Raya is committed to helping its clients reach their own cars </p>
            <p>We offer quality products that are cheaper than our competitors</p>
          </div>
          <div class="container-fluid d-flex justify-content-center ">
            <div class=" text-center ">
              <img class=" img-fluid" src="/fargasa/assets/imk/profil-img/respect-clients.png" alt="">
              <p>Respect of their Client needs</p>
            </div>
            <div class=" text-center ">
              <img class="img-fluid" src="/fargasa/assets/imk/profil-img/negotiation-power.png" alt="">
              <p>Negotiation Able</p>
            </div>
            <div class=" text-center ">
              <img class="img-fluid" src="/fargasa/assets/imk/profil-img/flexibility-efficient-solutions.png" alt="">
              <p>Effiecien Work</p>
            </div>
            <div class=" text-center ">
              <img class="img-fluid" src="/fargasa/assets/imk/profil-img/focus-on-innovation.png" alt="">
              <p>Focus on Client Need</p>
            </div>
            <div class=" text-center ">
              <img class="img-fluid" src="/fargasa/assets/imk/profil-img/global-know-how.png" alt="">
              <p>Huge Connection</p>
            </div>
          </div>
      </div>

      <!-- Contact -->
      <div class="container py-5 " style=" max-width: 100%;">
        <a name="contact">
          <h4 style="text-align: center; font-family: Glegoo,serif; font-size:40px">CONTACT US AT</h4>
          <div class="container  w-50">
            <div class="row " style="text-align: center; ">
              <div class="col my-1 mx-1 pt-3 " style="background-color: green; border-radius: 20px;  min-width: 100px;">
                <a href="" class="fa fa-whatsapp" aria-hidden="true" style="text-decoration: none; font-size: 30px; color:white;">Alam </a>
                <p style="color:white; font-size: 1vw;">Senior Sales Fargasa</p>
              </div>
              <div class="col my-1 mx-1 pt-3" style="background-color: green; border-radius: 20px;  min-width: 100px;">
                <a href="" class="fa fa-whatsapp" aria-hidden="true" style="text-decoration: none; font-size: 30px; color:white;">Ninit</a>
                <p style="color:white; font-size: 1vw;">CEO Fargasa</p>
              </div>
            </div>

          </div>
      </div>

      <footer style="background-color: black;">
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
          <a href=""> Alibaba Group</a>
        </div>
      </footer>
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

        $('#statInputMsg').click(function(){
            $(this).toast('hide');
        });

        $('.detailbtn').on('click', function() {
          var id = $(this).data('id');
          // 
          // console.log(id);
          $('#bookBtn').prop('disabled', true);
          $.ajax({
            url: '/fargasa/sites/misc/detail-barang.php',
            method: 'POST',
            data: {
              id: id
            },
            success: function(data) {
              $('#data_barang').html(data);

              $('#detailmodal').modal("show");
              $('#bookBtn').prop('disabled', false);
            }
          });
        });

        $('#bookBtn').click(function(){
            var id = $(this).parent().parent().find('#data_barang').find('input[type=hidden]').val();

            $.ajax({
            url: './php/booking.php',
            method: 'POST',
            data: {
              id: id
            },
            success: function(data) {
              $('#statInputMsg').html(data);
              $('.toast').toast('show');
            }
          });
        });
      })
    </script>

    </html>
<?php
}
?>