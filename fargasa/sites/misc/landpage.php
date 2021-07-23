<?php
$_SESSION['page'] = "landpage";
$dataStok = mysqli_query($con, "SELECT * FROM stok");
$dataBook = mysqli_query($con, "SELECT stok.id_pembelian, stok.id_stok, stok.nopol, stok.tipe,stok.tahun, stok.hrg_jual, stok.gambar, book.id_booking,book.id_pembelian,book.id_pelanggan, book.booking_stop FROM stok LEFT JOIN book ON stok.id_pembelian=book.id_pembelian where (book.booking_stop >= now()) OR (book.booking_stop IS NULL)");
$cek = array();
$stok = array();
$b = array();
$i=0;
while($fetch = mysqli_fetch_array($dataBook)){
//    echo("<br>Fetch ke - ".$i."<br>");
//    print_r($fetch);
    $b["id_pembelian"] = $fetch[0];
    // $b["tipe"] = $fetch["tipe"];
    // $b["tahun"] = $fetch["tahun"];
    // $b["hrg_jual"] = $fetch["hrg_jual"];
    // $b["gambar"] = $fetch["gambar"];

  $cek[$i] = $b;
  $i++;
  unset($b);
}

$i=0; // set ulang index
while($fetch = mysqli_fetch_array($dataStok)){ //Fetch ke array
  $b["id_pembelian"] = $fetch["id_pembelian"];
  $b["tipe"] = $fetch["tipe"];
  $b["tahun"] = $fetch["tahun"];
  $b["hrg_jual"] = $fetch["hrg_jual"];
  $b["gambar"] = $fetch["gambar"];

  $stok[$i] = $b;
  $i++;
  unset($b);
}
// $serialized = array_map('serialize', $cek);
// $unique = array_unique($serialized);
// $hasil = array_values(array_unique($cek, SORT_REGULAR));

//print_r($cek);
//echo("<br>======================================<br>");
//var_dump($cek);
// $cek = mysqli_fetch_array($data);
//echo array_count_values(array_column($cek, 'id_pembelian'))[$hasil[0]["id_pembelian"]];
$i=0;
// foreach($hasil as $x){
//     $hasil[$i]["booked"]= array_count_values(array_column($cek, 'id_pembelian'))[$x["id_pembelian"]];
//     $i++;
// }
//var_dump($stok[1]["id_pembelian"]);
//var_dump(array_column($cek, "id_pembelian"));
//var_dump(in_array($stok[2]["id_pembelian"], array_column($cek, "id_pembelian")));
foreach($stok as $x){
    if (in_array($x["id_pembelian"], array_column($cek, "id_pembelian")) == true){
        $stok[$i]["booked"]= array_count_values(array_column($cek, 'id_pembelian'))[$x["id_pembelian"]];
    }else{
        $stok[$i]["booked"] = 0;
    }
    $i++;
}

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
  <link rel="stylesheet" href="/fargasa/dist/css/style-index.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
</head>

<body>

  <!-- navbar -->
  <?php include_once $_SERVER['DOCUMENT_ROOT']."/fargasa/sites/misc/navbar/landpageNavbar.php";?>

  
  <!--   carousel   -->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <section id="promo">
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
      </section>
  </div>
  </div>

  <!--   catalog   -->
  <div class="container-fluid" style="margin-top:50px;">
    <section id="catalog">
      <h4 class="text-center " style="font-size:40px; color:gray; font-family: Glegoo,serif;">Gallery Mobil</h4>
      <div class="container-fluid mt-4 row d-flex justify-content-center">
        <?php foreach ($stok as $elements) : ?>
          <div class="row d-inline-flex mx-2">
            <div class="card m-2 " style="width: 18rem;">
              <img class="img-fluid" src="/fargasa/assets/gambar/<?= $elements["gambar"] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text d-none" id="id"><b><?= $elements["id_pembelian"] ?></b></p>
                <h5 class="card-title" id="tipe"><b><?= $elements["tipe"] ?></b><span><small class="font-weight-bold font-italic border-left border-dark ml-2"> <?php echo $elements["tahun"]; ?></small></span></h5>
                <p class="card-text" id="hrg_beli"><b><?= $conn->intToRupiah($elements["hrg_jual"]) ?></b></p>
                <?php if($elements["booked"]<3){
                    echo '<button class="btn btn-primary mx-auto d-flex justify-content-center detailbtn" data-toggle="modal" data-target="#detailmodal" data-id='.$elements["id_pembelian"].'" data-booked="false">
                            Lihat detail
                        </button>';
                }else{
                    echo '<button class="btn btn-primary mx-auto d-flex justify-content-center detailbtn" data-toggle="modal" data-target="#detailmodal" data-id='.$elements["id_pembelian"].'" data-booked="true">
                            Lihat detail
                        </button>';
                }?>
             
                
              </div>
              <?php
                if($elements["booked"]<3){
                    echo '<div class="w-100 mt-2 p-2 badge badge-secondary d-none statusBooked" style="position: absolute; bottom:0;">
                            Booking Penuh
                        </div>';
                }else{
                    echo '<div class="w-100 mt-2 p-2 badge badge-secondary statusBooked" style="position: absolute; bottom:0;">
                            Booking Penuh
                        </div>';
                }
              ?>
              
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </section>
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
          <a href="/fargasa/index.php?action=login"> <button type="button" class="btn btn-primary">Login untuk Book</button></a>
        </div>
      </div>
    </div>
  </div>

  <!--Profil  -->
  <div class="container mt-5 profil" style=" max-width: 100%;">
    <section id="profil">
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
    </section>
  </div>

  <!-- Contact -->
  <div class="container py-5 " style=" max-width: 100%;">
    <section id="contact">
      <h4 style="text-align: center; font-family: Glegoo,serif; font-size:40px">CONTACT US AT</h4>
        <div class="row" style="text-align: center; ">
            <div class="col-md my-1 mx-1 pt-3 my-auto">
                <div class="row text-center">
                    <button class="btn btn-success w-100 m-4 rounded rounded-pill btn-wa"> <i class="fa fa-whatsapp" aria-hidden="true"></i>
                        Alam<span><p style="color:white; font-size: 1vw;">Senior Sales Fargasa</p></span></button>

                </div>
                <div class="row text-center">
                    <button class="btn btn-success w-100 m-4 rounded rounded-pill btn-wa"> <i class="fa fa-whatsapp" aria-hidden="true"></i>
                        Renita<span><p style="color:white; font-size: 1vw;">CEO Fargasa</p></span></button>
                </div>
            </div>
            <div class="col-md my-1 mx-1 pt-3">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.9363610246983!2d106.07542542916208!3d-6.0296340997270645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e418d54e2d91d2d%3A0x33178893f5540c59!2sShow%20Room%20Fargasa%20Mobilindo!5e0!3m2!1sid!2sid!4v1624358803962!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
          

      </div>
    </section>
          <!-- Top Scroll Button -->
          <button type="button" id="topJumpBtn" class="btn btn-primady border border-dark rounded-circle">
              <span class="fa fa-chevron-up align-middle" role="button">
                  <!-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
                  </svg> -->
              </span>
          </button>
          <!-- end of Top Scroll Button -->
  </div>

  <footer style="background-color: black;">
    <div class="footer-copyright text-center py-3">© 2021 Copyright:
      <a href=""> Alibaba Group</a>
    </div>
  </footer>
  <style>
      .btn-wa{
          background-color: green
      }.btn-wa:hover{
          background-color: rgb(14, 173, 5);
      }
  </style>
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
      var id = $(this).data('id');
      console.log(id);
      $('#detailmodal').modal('show');
      $.ajax({
        url: '/fargasa/sites/misc/detail-barang.php',
        method: 'POST',
        data: {
          id: id
        },
        success: function(data) {
          $('#data_barang').html(data);
          $('#detailmodal').modal("show");
        }
      });
    });

    $('#topJumpBtn').each(function(){
        $(this).click(function(){ 
            $('html,body').animate({ scrollTop: 0 }, 'slow');
            return false; 
        });
    });
  })
</script>

</html>