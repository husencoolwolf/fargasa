<?php
$page = $_SESSION['page'];
$subPage = "";
if (isset($_SESSION['subPage'])) {
  $subPage = $_SESSION['subPage'];
}
$queryDataSisaWaktu= "SELECT b.id_pembelian, current_timestamp() as sekarang, b.booking_stop, p.tipe, p.tahun, p.gambar, p.hrg_jual, b.id_booking from book b INNER JOIN pembelian p ON b.id_pembelian=p.id_pembelian where (b.id_pelanggan=".$_SESSION["id_user"].") AND (b.booking_stop >= now())";
$dataSisaWaktu = mysqli_query($con, $queryDataSisaWaktu);
//    var_dump($queryDataSisaWaktu);
$sisaWaktu = array();
while($fetch = mysqli_fetch_array($dataSisaWaktu)){ //Fetch ke array
  $sisaWaktu["booking_stop"] = $fetch["booking_stop"];
  $sisaWaktu["sekarang"] = $fetch["sekarang"];
  $sisaWaktu["id_pembelian"] = $fetch["id_pembelian"];
  $sisaWaktu["tipe"] = $fetch["tipe"];
  $sisaWaktu["tahun"] = $fetch["tahun"];
  $sisaWaktu["gambar"] = $fetch["gambar"];
  $sisaWaktu["hrg_jual"] = $fetch["hrg_jual"];
  $sisaWaktu["id_booking"] = $fetch["id_booking"];
}
?>

<head>
    <link rel="stylesheet" href="/fargasa/sites/pelanggan/css/style-cart.css" />

</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <!--  Show this only on mobile to medium screens  -->
  <a class="navbar-brand d-lg-none" href="#">
    <img class="" src="/fargasa/assets/Fargasa Logo Circle.png" alt="Dashboard" style="width: 80px">
  </a>
  <button class="navbar-toggler btn btn-dark cartButton" style="background-color: black; color: white;">
          <i class="fa fa-bell" aria-hidden="true"></i>
        </button>
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
        <a class="nav-link active" href="/fargasa/sites/pelanggan/pelangganMainMenu.php#catalog">CATALOG <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item px-3 ml-0">
        <a class="nav-link" href="/fargasa/sites/pelanggan/pelangganMainMenu.php#promo">PROMO</a>
      </li>
      <li class="nav-item px-3 ml-0">
        <a class="nav-link" href="/fargasa/sites/pelanggan/pelangganMainMenu.php#profil">PROFIL</a>
      </li>
      <li class="nav-item px-3 ml-0">
        <a class="nav-link" href="/fargasa/sites/pelanggan/pelangganMainMenu.php#contact">HUBUNGI KAMI</a>
      </li>
      <li class="nav-item px-3 ml-0 <?php if ($page=="PelangganInputPenawaran") echo "active"; ?>">
        <a class="nav-link <?php if ($page=="PelangganInputPenawaran") echo "font-weight-bold"; ?>" href="/fargasa/sites/pelanggan/penawaran/PelangganInputPenawaran.php">BUAT PENAWARAN</a>
      </li>
    </ul>



    <ul class="navbar-nav">
      <!-- Profile Button -->
      <li>
        <button class="btn btn-dark cartButton">
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

<div class="container">
    <div class="shopping-cart" style="display: none">
    <div class="shopping-cart-header">
      <i class="fa fa-bookmark cart-icon"></i><span class="badge"></span>
      <div class="shopping-cart-waktu">
        <span class="lighter-text">Waktu Tersisa:</span>
        <span class="digital-clock"> -:-:-</span>
        
      </div>
    </div>
    <!--end shopping-cart-header -->
    <?php
    if(count($sisaWaktu)<>0){ ?>
    <ul class="shopping-cart-items" id="cart-body" style="list-style-type: none;">
        <li class="clearfix" >
        <div class="item-cart">
            <img src=" /fargasa/assets/gambar/<?=$sisaWaktu["gambar"];?>" id="imgBook" />
            <span class="item-name" id="tipeBook"><?php echo ($sisaWaktu["tipe"]." ".$sisaWaktu["tahun"])?></span>
            <span class="text-black" id="hrgBook"><small><?=$sisaWaktu["hrg_jual"];?></small></span>
        </div>
      </li>
      <div class="row">
          <div class="col">
                <button class="btn btn-primary h-100 button-cek-book detailBookBtn" data-id="<?= $sisaWaktu["id_pembelian"] ?>">Lihat Detail</button>
          </div>
          <div class="col">
                <button type="button" id="cancelBook" class="btn btn-danger" data-id="<?= $sisaWaktu["id_booking"] ?>" data-dismiss="modal">Cancel Book</button>
          </div>
      </div>
    </ul>
    <?php
    }else{ ?>
    <ul class="shopping-cart-items" id="cart-body" style="list-style-type: none;">
        <div class="row">
            <div class="badge badge-info w-100"><span>Anda Belum Booking</span></div>
        </div>
    </ul>
    <?php
    }
    ?>
  </div>
  <!--end shopping-cart -->

</div>

<script src="/fargasa/dist/js/jquery-3.5.1.js"></script>
<script>

       //timer
        // Set the date we're counting down to
        var countDownDate;
        var now;
        <?php
            if (count($sisaWaktu)<>0){
                ?>
                    countDownDate =  new Date("<?= $sisaWaktu["booking_stop"]?>").getTime();
                    now = new Date("<?= $sisaWaktu["sekarang"]?>").getTime();
                <?php
            }
        ?>
        
        
        // Update the count down every 1 second
        var x = setInterval(function() {
                    mulaiTimer();
                }, 1000);
        <?php if(count($sisaWaktu)==0){
            ?>
//                alert("kocak");
                clearInterval(x);
                
            <?php
        }else{
            ?>
            addBookBtnAction();
            <?php
        }?>
            
//        fungsi mulai timer
        function mulaiTimer(){
 
            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Get today's date and time
            now = updateNow(now);
//            console.log(now);
            // Time calculations for days, hours, minutes and seconds
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"

            $('.digital-clock').html( hours + "h "
            + minutes + "m " + seconds + "s ");

            // If the count down is over, write some text 
            if (distance < 0) {
              clearInterval(x);
              $('.digital-clock').html("EXPIRED") ;
            }
          }
        

        function updateNow(time){
            return time+1000;
        }
        
        function addBookBtnAction(){
            $('.detailBookBtn').on('click', function(){
                var id = $(this).data('id');
                $.ajax({
                    url: '/fargasa/sites/misc/detail-barang.php',
                    method: 'POST',
                    data: {
                      id: id,
                      booked: $(this).data("booked")
                    },
                    success: function(data) {
                      $('#detailbookmodalbody').html(data);

                      $('#detailbookmodal').modal("show");


                    }
                  });
            });
            
            $('#cancelBook').on('click', function(){
                var id = $(this).data('id');
                if (confirm('Anda yakin ingin batal Booking ?')) {
                    $.ajax({
                        url: '/fargasa/sites/pelanggan/php/cancelBook.php',
                        method: 'POST',
                        data: {
                          id: id
                        },
                        success: function(data) {
                            $('#statInputMsg').html(data);
                            $('.toast').toast('show');
                            $('#cart-body').html(`
                            <div class="row">
                                <div class="badge badge-info w-100"><span>Anda Belum Booking</span></div>
                            </div>`);
                            
                            clearInterval(x);
                            $('.digital-clock').html("-:-:-") ;
                        }
                    });
                }
                
            });
        }
    
  (function() {

    $(".cartButton").on("click", function() {
      $(".shopping-cart").fadeToggle("fast");
    });

  })();
</script>