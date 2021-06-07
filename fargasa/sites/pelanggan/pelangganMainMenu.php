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
    $dataStok = mysqli_query($con, "SELECT * FROM stok");
    $dataBook = mysqli_query($con, "SELECT stok.id_pembelian, stok.id_stok, stok.nopol, stok.tipe,stok.tahun, stok.hrg_jual, stok.gambar, book.id_booking,book.id_pembelian,book.id_pelanggan, book.booking_stop FROM stok LEFT JOIN book ON stok.id_pembelian=book.id_pembelian where (book.booking_stop >= now())");
    $queryDataSisaWaktu= "SELECT b.id_pembelian, current_timestamp() as sekarang, b.booking_stop, p.tipe, p.tahun, p.gambar, p.hrg_jual, b.id_booking from book b INNER JOIN pembelian p ON b.id_pembelian=p.id_pembelian where (b.id_pelanggan=".$_SESSION["id_user"].") AND (b.booking_stop >= now())";
    $dataSisaWaktu = mysqli_query($con, $queryDataSisaWaktu);
//    var_dump($queryDataSisaWaktu);
    $cek = array();
    $stok = array();
    $sisaWaktu = array();
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
    
    $i=0; // set ulang index
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
    
    $i=0;

    foreach($stok as $x){
        if (in_array($x["id_pembelian"], array_column($cek, "id_pembelian")) == true){
            $stok[$i]["booked"]= array_count_values(array_column($cek, 'id_pembelian'))[$x["id_pembelian"]];
        }else{
            $stok[$i]["booked"] = 0;
        }
        $i++;
    }
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
    
    <section id="promo">
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
        </section>
      

      <!--   catalog   -->
      <section id="catalog">
      <div class="container-fluid" style="margin-top:50px;">
        
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
      </div>
        </section>
      <!--container div  -->

      <!-- Modal detail barang -->
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
              <button type="button" id="bookBtn" class="btn btn-primary" data-dismiss="modal">Book Sekarang</button>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Modal detail barang bookingan pelanggan-->
      <div class="modal fade" id="detailbookmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="tipe">Detail Barang</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="detailbookmodalbody" data-id="">

            </div>
            <div class="modal-footer">
              
              
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!--Profil  -->
      <section id="profil">
      <div class="container mt-5 profil" style=" max-width: 100%;">
          
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
        </section>

      <!-- Contact -->
      <section id="contact">
      <div class="container py-5 " style=" max-width: 100%;">
        
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
        </section>

      <footer style="background-color: black;">
        <div class="footer-copyright text-center py-3">© 2021 Copyright:
          <a href=""> Alibaba Group</a>
        </div>
      </footer>
      
      <!-- Top Scroll Button -->
      <button type="button" id="topJumpBtn" class="btn btn-dark rounded-circle">
          <span class="fa fa-chevron-up align-middle" role="button">
              <!-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
              </svg> -->
          </span>
      </button>
      <!-- end of Top Scroll Button -->
      
      
      <script src="/fargasa/dist/js/jquery-3.5.1.js"></script>
      <script src="/fargasa/dist/js/bootstrap.js"></script>
      
    </body>
    <script>
        $(document).ready(function() {
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
        
        
      if ($(window).width() < 768) {
        $('#brandMobile').show();
        $('#brandPC').hide();
      } else {
        $('#brandPC').show();
        $('#brandMobile').hide();
      }


      
          
        

        $('#statInputMsg').click(function(){
            $(this).toast('hide');
        });

        $('.detailbtn').on('click', function() {
          var id = $(this).data('id');
          // 
          // console.log(id);
//          console.log($(this).data('booked'));
          if($(this).data('booked')==true){//kalau booking sudah 3x
                $('#bookBtn').html('Booking Penuh');
                $('#bookBtn').addClass('btn-secondary').removeClass('btn-primary');
                $('#bookBtn').prop('disabled', true);
            }else{
                $('#bookBtn').html('Book Sekarang');
                $('#bookBtn').addClass('btn-primary').removeClass('btn-secondary');
                $('#bookBtn').prop('disabled', false);
            }
          $.ajax({
            url: '/fargasa/sites/misc/detail-barang.php',
            method: 'POST',
            data: {
              id: id,
              booked: $(this).data("booked")
            },
            success: function(data) {
              $('#data_barang').html(data);

              $('#detailmodal').modal("show");

                
            }
          });
//          if($(this).data("booked")=="true"){//kalau booking sudah 3x
//              $('#bookBtn').prop('disabled', true);
//          }
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
//                console.log(jQuery.parseJSON(data));
                var hasil = jQuery.parseJSON(data);
              $('#statInputMsg').html(hasil[0]);
              $('.toast').toast('show');
//              if(hasil[0])
              var waktu = jQuery.parseJSON(hasil[1]);
                //0-booking stop, 1-sekarnag, 2-id beli, 3-tipe, 4-tahun, 5-gambar, 6-hrg jual, 7-id booking
              console.log(waktu[0]);
              if(waktu[0]!==null){
                  $('#cart-body').html(`
                    <li class="clearfix" >
                    <div class="item-cart">
                        <img src=" /fargasa/assets/gambar/${waktu[5]}" id="imgBook" />
                        <span class="item-name" id="tipeBook">${waktu[3]+" "+waktu[4]}</span>
                        <span class="text-black" id="hrgBook"><small{Rp. ${waktu[6]}</small></span>
                    </div>
                    </li>
                    <div class="row">
                        <div class="col">
                              <button class="btn btn-primary h-100 button-cek-book detailBookBtn" data-id="${waktu[2]}">Lihat Detail</button>
                        </div>
                        <div class="col">
                              <button type="button" id="cancelBook" class="btn btn-danger" data-id="${waktu[7]}" data-dismiss="modal">Cancel Book</button>
                        </div>
                    </div>
                    `)
                countDownDate = new Date(waktu[0]).getTime();
                now = new Date(waktu[1]).getTime();
                x = setInterval(function() {
                      mulaiTimer();
                  }, 1000);
                  addBookBtnAction();
              }
            }
          });
        });
        
        $('#topJumpBtn').each(function(){
            $(this).click(function(){ 
                $('html,body').animate({ scrollTop: 0 }, 'slow');
                return false; 
            });
        });
        
        //fungsi tambah event click di button detail bookingan pelanggan
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
        
        
      });
    </script>

    </html>
<?php
}
?>