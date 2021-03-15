<!--Super Index-->
<!DOCTYPE html>
<!-- Todo 
*Buat gambar untuk thumbnail nya ajh dlu. minta yg real
s

-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Andalani</title>
        <link rel="stylesheet" href="dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="dist/css/animate.min.css">
        <link rel="stylesheet" type="text/css" href="dist/css/style-index.css">
        <link rel="stylesheet" type="text/css" href="dist/css/aos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        
    </head>
    <body>
        <!--navigasi-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="atas">
            <div class="container-fluid">
            <div class="d-flex align-baseline">
              <a class="navbar-brand" href="/andalani" style="font-family: Giddyup">
                <p id="BrandName" class="d-inline">Andalani</p>
              </a>
            </div>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="../" data-toggle="collapse" data-target=".navbar-collapse.show" disabled>Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ItemCard" data-toggle="collapse" data-target=".navbar-collapse.show">Produk Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact-us" data-toggle="collapse" data-target=".navbar-collapse.show">Contact Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown">
                            Dropdown link
                        </a>
                        <div class="dropdown-menu rounded-0 border-light bg-dark px-1" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item text-light bg-dark" href="#">Action</a>
                            <a class="dropdown-item text-light bg-dark" href="#">Another action</a>
                            <a class="dropdown-item text-light bg-dark" href="#">Something else here</a>
                        </div>
                    </li>
              </ul>
            </div>
            </div>
        </nav>
        <!-- navigasi bawah -->
        <div id="Tutor" class="navbar navbar-expand-lg navbar-light bg-light border-top rounded-top border-primary fixed-bottom">
            <div class="float-right">
                <button type="button" class="close" aria-label="Close" id="closeNavBawah">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="tutorText">
                <h5>Ingen Segera Memesan Sekarang?! Segera Ketahui Prosedur Pemesanan Kami !!!</h5>
            </div>

            <div id="tutorBtn">
                <button type="button" class="btn btn-info">Pelajari</button>
            </div>
            
        </div>

       
        


        <!-- jumbotron -->
        <div class="jumbotron d-block mt-5 text-right" style="background-image: url(assets/gambar/pexels-pixabay-262978-2.jpg);">
          <h1 class="display-5 text-light font-weight-bold">Hello, world!</h1>
          <p class="lead text-light font-weight-bold">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
          <hr class="my-4">
          <p class="text-light font-weight-bold">It uses utility classes for typography and spacing to space content out within the larger container.</p>
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
        
        <div class="dropdown-divider pb-4"></div>

        <!-- Cards -->
        <section class="ItemCard mb-4" id="ItemCard">
        <div class="container">
          <div class="row">
            <div class="card-deck Items">
              <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-duration="2500">
              <div class="card">
                <img class="card-img-top" src="assets/gambar/tmb-sambal.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Sambal Ayam Geprek</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="d-flex orderButton justify-content-between">
                  <a href="#" class="btn btn-primary m-4">Go somewhere</a>
                  <a href="#" class="btn btn-primary m-4">Go somewhere</a>
                </div>
                <div class="card-footer">
                  <strong class="text-black bg-light" style="font-size: larger;">Rp. 35.000</strong>
                </div>
              </div>
              </div>
              <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-duration="2500">
              <div class="card">
                <img class="card-img-top" src="assets/gambar/example2.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="d-flex orderButton">
                  <a href="#" class="btn btn-primary m-4">Go somewhere</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
              </div>
              <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-duration="2500">
              <div class="card">
                <img class="card-img-top" src="assets/gambar/example2.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="d-flex orderButton">
                  <a href="#" class="btn btn-primary m-4">Go somewhere</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="card-deck Items">
              <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-duration="2500">
              <div class="card">
                <img class="card-img-top" src="assets/gambar/example2.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="d-flex orderButton">
                  <a href="#" class="btn btn-primary m-4">Go somewhere</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
              </div>
              <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-duration="2500">
              <div class="card">
                <img class="card-img-top" src="assets/gambar/example2.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="d-flex orderButton">
                  <a href="#" class="btn btn-primary m-4">Go somewhere</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
              </div>
              <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-duration="2500">
              <div class="card">
                <img class="card-img-top" src="assets/gambar/example2.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="d-flex orderButton">
                  <a href="#" class="btn btn-primary m-4">Go somewhere</a>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        </section>

        <div class="dropdown-divider mb-4"></div>

        <!-- contact us -->
        <section id="contact-us" class="contact-us p-3" style="min-height: 500px;">
          <div class="container">
            
            <h1 class="text-right mb-4">Contact us</h1>
            <div class="row">

              <!-- social Button -->
              <div class="col-xl-5 mb-5 order-xl-2">
                <div class="row text-center">
                  <div class="col">
                    <div class="contact-button" id="itemSatu">
                      <button title="On Road" class="btn btn-link collapsed border rounded-circle px-1" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1" aria-pressed="false">
                        <i class="fa fa-map-marker fa-fw fa-2x text-white" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                  
                  <div class="col">
                    <div class="contact-button" id="itemDua">
                      <button title="Email" class="btn btn-link collapsed border rounded-circle px-1" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2" aria-pressed="false">
                        <i class="fa fa-envelope-o fa-fw fa-2x text-white" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                  
                  <div class="col">
                    <div class="contact-button" id="itemTiga">
                      <button title="Whatsapp" class="btn btn-link collapsed border rounded-circle px-1" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3" aria-pressed="false">
                        <i class="fa fa-whatsapp fa-fw fa-2x text-white" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- Form and map -->
              <div class="col-xl-7 order-xl-1" >
                <div id="masterr">
                  <div id="collapse1" class="contact-form collapse" aria-labelledby="itemSatu" data-parent="#masterr">
                    <div class="map">
                      <!-- 
                        Lokasi : Sebrang, Jl. Merpati Raya Jl. Gelatik No.161, RT.4/RW.3, Sawah Lama, Kec. Ciputat, Kota Tangerang Selatan, Banten 15413
                        koordinat : 
                       -->
                       <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7144732678685!2d106.7288068140207!3d-6.30119816342147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f13f85aca54f%3A0xb910a4603f36c9d7!2sAndalani%20sambal%20ayam%20geprek!5e0!3m2!1sen!2sid!4v1597692795407!5m2!1sen!2sid" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                  </div>
    
                  <div id="collapse2" class="contact-form collapse" aria-labelledby="itemDua" data-parent="#masterr">
                    <form id="formEmail" action="#" enctype="multipart/form-data" >
                      <div class="form-label">
                        <input type="email" class="form-control" placeholder="Email" required>
                      </div>
                    </form>
                  </div>
    
                  <div id="collapse3" class="contact-form collapse" aria-labelledby="itemTiga" data-parent="#masterr">
                    <form id="formWA" action="dist/php/form/whatsAppForm.php" enctype="multipart/form-data" method="POST" >
                      <div class="form-label mb-3">
                        <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                      </div>
                      <div class="form-label mb-3">
                        <input type="text" name="kota" class="form-control" placeholder="Kota" required>
                      </div>
                      <div class="form-label mb-3">
                        <input class="btn btn-primary" type="submit" value="kirim">
                      </div>
                    </form>
                  </div>
                </div>
                
              </div>
              
              
            </div>
          </div>
        </section>

        <br><br>
        


        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        
        
        <?php
        // put your code here
        ?>

        <!-- Group collapse -->
        
        
        <!-- tombol keatas -->

        <button type="button" id="topJumpBtn" class="btn btn-secondary border rounded">
            <span class="fa fa-chevron-up align-middle" role="button">
                <!-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z"/>
                </svg> -->
            </span>
        </button>

        <footer class="text-muted">
          <div class="container">
            <p class="float-right">
              <a href="#">Back to top</a>
            </p>
            <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
          </div>
        </footer>

    </body>
        <script src="dist/js/jquery-3.5.1.js"></script>
        <script src="dist/js/popper.min.js"></script>
        <script src="dist/js/bootstrap.min.js"></script>
        <script src="dist/js/aos.js"></script>
        <script>
            // Variables
            var scrollPos = $(window).scrollTop();
            var topJumpPos = $("#topJumpBtn").css("bottom");
            var navBottomClosed = false;
            var isBottom = false;
            var Colors = {"hitam" : 'rgb(0, 0, 0)', "cyan" : 'rgb(0, 255, 255)', "ufoGreen" : 'rgb(79, 206, 93)'};
            var hitam = 'rgb(0, 0, 0)', cyan = 'rgb(0, 255, 255)', ufoGreen = 'rgb(79, 206, 93)';

            // jquery start
            $(document).ready(function(){
              $("#closeNavBawah").click(function(){
                $("#topJumpBtn").css("bottom", "10px");
                $("#Tutor").addClass('animate__animated');
                $("#Tutor").addClass('animate__slideOutDown');
                navBottomClosed = true;
              });

              // scroll event
              $(window).scroll(function() {
                if($(window).scrollTop() + $(window).height() >= 
                    $(document).height() - 70) {
                  // topJumpPos = $("#topJumpBtn").css("bottom");
                  $("#topJumpBtn").css("bottom", "10px");
                  $("#Tutor").hide();
                  $("#Tutor").show();
                  $("#Tutor").addClass('animate__animated');
                  $("#Tutor").addClass('animate__slideOutDown');
                  isBottom = true;
                  


                }else if(($(window).scrollTop() + $(window).height() < $(document).height()-70) && 
                        ($("#Tutor").css("display") == 'block') && 
                        (navBottomClosed == false) &&
                        (isBottom == true)){
                  if(($(window).width() <= 935-16) && ($(window).width() >= 770-16)){
                    topJumpPos = '100px';
                  }else if(($(window).width() <= 770-16)){
                    topJumpPos = '130px';
                  }else{
                    topJumpPos = '50px';
                  }

                  $("#topJumpBtn").css("bottom", topJumpPos);
                  $("#Tutor").removeClass('animate__animated');
                  $("#Tutor").removeClass('animate__slideOutDown');
                  $("#Tutor").removeClass('animate__slideInUp');
                  $("#Tutor").hide();
                  
                  $("#Tutor").show();
                  $("#Tutor").addClass('animate__animated');
                  $("#Tutor").addClass('animate__slideInUp');
                  isBottom = false;
                }


              });
              
              

              $(document).on('click', '.navbar-collapse > ul > li > a[href^="#"]', function (event) {
                  event.preventDefault();
                  // $('.navbar-toggler').attr('aria-expanded','false');
                  // $(this).
                  $('html, body').animate({
                      scrollTop: $($.attr(this, 'href')).offset().top
                  }, 'slow');
              });

              $('#topJumpBtn').each(function(){
                  $(this).click(function(){ 
                      $('html,body').animate({ scrollTop: 0 }, 'slow');
                      return false; 
                  });
              });

              // alert($('.contact-button button').eq(1).attr('title'));
              
              $(document).on('click', '.contact-button button' ,function (event) {

                $('.contact-button button').css('background-color', 'black');
                if(($('.contact-button').children().index(this) == 0) && //gmaps
                    ($(this).css('background-color') == hitam)
                  ){
                    
                    $(this).css('background-color', 'red');
                } else if(($('.contact-button').children().index(this) == 1) && //email
                    ($(this).css('background-color') == hitam)
                  ){
                    $(this).css('background-color', 'cyan');
                } else if(($('.contact-button').children().index(this) == 2) && //whatsapp
                    ($(this).css('background-color') == hitam)
                  ){
                    $(this).css('background-color', 'rgb(79, 206, 93)');
                }
                
              });

              

              //end jquery
            });
            AOS.init();
        </script>

        <style>
            @font-face {
                font-family: "Giddyup";
                src: url("dist/font/GiddyupStd.otf");
                
            }
        </style>
</html>


